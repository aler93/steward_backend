<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Produto;
use App\Models\ProdutoVariacao;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Exception;

class DownloadImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:save';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Salva links de imagens no projeto local e atualiza os links';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $prods = $this->produtos();

        if( count($prods) > 0 ) {
            // Realizar download
            foreach( $prods as $img ) {
                if( strlen($img["image_link"]) <= 0 ) {
                    continue;
                }

                $nameProd = slugger($img["nome"]) . ".png";
                try{
                    $r     = Http::get($img["image_link"]);
                    $saved = Storage::put("img/" . $nameProd, $r->body());
                    
                    if( $saved ) {
                        // Atualizar link
                        $link  = env("APP_URL") . "/img/" . $nameProd;
                        $table = Produto::where("uuid", "=", $img["uuid"])->first();

                        $table->image_link  = $link;
                        $table->image_local = true;
                        $table->save();

                        dump("Imagem salva: " . $img["nome"]);

                        continue;
                    }

                    throw new Exception("Erro ao salvar imagem no disco local");
                }catch( Exception $e ) {
                    dump("Erro ao obter imagem {$img['nome']} - " . $e->getMessage());
                }
            }
        }

        return Command::SUCCESS;
    }

    private function produtos(): array
    {
        $toDownload = [];
        $produtos   = Produto::where("image_local", "=", false)->get()->toArray();

        foreach( $produtos as $prod ) {
            $toDownload[] = [
                "image_link" => $prod["image_link"],
                "nome"       => $prod["nome"],
                "uuid"       => $prod["uuid"],
            ];
        }

        $variacoes = ProdutoVariacao::where("image_local", "=", false)->get()->toArray();
        foreach( $variacoes as $var ) {
            $toDownload[] = [
                "image_link" => $var["image_link"],
                "nome"       => $var["nome"],
                "uuid"       => $var["uuid"],
            ];
        }

        return $toDownload;
    }
}
