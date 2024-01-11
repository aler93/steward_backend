<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Produto;

class ProdutoVariacao extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $whisky = Produto::where("nome", "=", "Whisky")->first();
        $sal    = Produto::where("nome", "=", "Sal")->first();

        $produtos = [
            // Johnnie Walker
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Johnnie Walker - Red Label",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://images.tcdn.com.br/img/img_prod/907279/whisky_johnnie_walker_red_label_750ml_25299_1_99e84b5b0b1bbcbf27397a2e7e98c8b5.jpg",
            ],
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Johnnie Walker - Black Label",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://images.tcdn.com.br/img/img_prod/907279/whisky_johnnie_walker_black_label_12_anos_750ml_25285_1_d29753ef14d7d1f71258668ade47705f.jpg",
            ],
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Johnnie Walker - Double Black",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://a-static.mlcdn.com.br/450x450/whisky-johnnie-walker-double-black-label-12-anos-1-litro/larawineslojadevinhoseespumantes/13488530512/af6db5d7ffb16f1451a0090e0a2742aa.jpeg",
            ],
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Johnnie Walker - Blonde Label",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://cdn.awsli.com.br/800x800/1305/1305297/produto/150198374f9806772f2.jpg",
            ],
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Johnnie Walker - Gold Label",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://cdn.awsli.com.br/600x450/91/91186/produto/3247997/7d81886acf.jpg",
            ],
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Johnnie Walker - Green Label",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://www.planetaaguaadega.com.br/uploads/img/550/whisky-johnnie-walker-green-label-island-green-1l-a65a475d414e270581c983fa78565c86.webp",
            ],
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Johnnie Walker - Blue Label",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://images-americanas.b2w.io/produtos/4316222742/imagens/whisky-johnnie-walker-blue-label-750ml/4316222785_1_large.jpg",
            ],

            // Jack Daniel's
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Jack Daniel's - Old No. 7",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://cdn.iset.io/assets/50100/produtos/24/whisky-jack-daniel-s-old-no7-tennessee-1000ml1-266bd2c6be7ba26a9214773409464892-1024-1024.jpg",
            ],
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Jack Daniel's - Honey",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://bhzdistribuidora.com.br/wp-content/uploads/2020/06/Whisky-Jack-Honney.png",
            ],
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Jack Daniel's - Apple",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://nunesbebidas.com.br/wp-content/uploads/2021/04/Nunes-Bebidas-WHISKY-APPLE-JACK-DANIELS-1-LITRO.jpg",
            ],
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Jack Daniel's - Fire",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://morumbi.bujaotabacaria.com.br/wp-content/uploads/2022/07/a5209cb98aa07b3b604a0654dc4f835a.jpg",
            ],

            // Outros
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Singleton - 12 years",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://dlpvinhos.agilecdn.com.br/007310_1.jpg",
            ],
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Royal Salute",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://m.media-amazon.com/images/I/518+lSygSkL.jpg",
            ],
            [
                "produto_id"   => $whisky->id,
                "nome"         => "Buffalo Trace Bourbon",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://http2.mlstatic.com/D_NQ_NP_2X_757942-MLU50940780949_072022-F.webp",
            ],
            // Sal
            [
                "produto_id"   => $sal->id,
                "nome"         => "Sal de cozinha",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://www.extrabom.com.br/uploads/produtos/350x350/10338_7896029310014.jpg",
            ],
            [
                "produto_id"   => $sal->id,
                "nome"         => "Sal Grosso",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://hortifrutijardins.com.br/wp-content/uploads/2020/07/sal-grosso.jpg",
            ],
            [
                "produto_id"   => $sal->id,
                "nome"         => "Sal grosso temperado",
                "peso"         => null,
                "peso_unidade" => null,
                "sabor"        => null,
                "unidades"      => 1,
                "image_link"   => "https://donanena.com.br/wp-content/uploads/2023/01/sal-grosso-temperado-500g.png",
            ],
        ];

        foreach( $produtos as &$prod ) {
            $prod["created_at"] = now()->format("Y-m-d H:i:s");
            $prod["updated_at"] = now()->format("Y-m-d H:i:s");
        }

        DB::table("produto_variacao")->insert($produtos);
    }
}
