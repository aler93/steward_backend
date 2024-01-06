<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdutoSeed extends Seeder
{
    private array $categorias = [];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->getCategorias();

        $produtos = [
            // Higiêne pessoal
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Absorvente",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Barbeador",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://cdn.awsli.com.br/600x700/1884/1884519/produto/211243794/aparelho-de-barbear-super-barba-phllxs.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Lâmina de barbear",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://lojaslivia.fbitsstatic.net/img/p/lamina-de-barbear-enox-platinum-100-unidades-1-2-102885/288051.jpg?w=800&h=800&v=no-change&qs=ignore",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Desodorante",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://io.convertiez.com.br/m/superpaguemenos/shop/products/images/27992/medium/desodorante-rexona-aerosol-feminino-invisible-150ml-1cd12a54_91136.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Hastes flexíveis",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://io.convertiez.com.br/m/trimais/shop/products/images/12910/medium/hastes-flexiveis-cottonbaby-c150_10909.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Lenço umedecido",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://www.farmadireta.com.br/imagens-complete/445x445/lenco-umedecido-jj-recem-nascido-com-48-unidades-2a54c38fa6.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Papel Higiênico",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://beagaembalagem.com.br/wp-content/uploads/2014/09/Papel-Higi%C3%AAnico-Institucional-300-metros.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Sabonete",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://dedcosmeticosonline.com.br/wp-content/uploads/2023/03/Sabonete-em-barra-boticollection-5unidades-o-boticario.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Sabonete líquido",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://cdn.awsli.com.br/600x700/2469/2469058/produto/230651206/kit-5-sabonete-500ml-7inv4e8vn6.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Talco",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://res.cloudinary.com/beleza-na-web/image/upload/w_1500,f_auto,fl_progressive,q_auto:eco,w_800/v1/imagens/product/20046646/6122f6e3-3ae1-4410-9904-3c24ea8fbf04-inoar-banho-a-banho-desodorante-talco-200g.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Desodorante p/ tênis",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://www.perfumariasumire.com.br/media/catalog/product/t/e/tenys-pe-baruel-aerosol-canforado-110g.jpeg?optimize=medium&bg-color=255,255,255&fit=bounds&height=563&width=553&canvas=553:563",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Preservativo",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Protetor solar",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://static.farmabemfarmacia.com.br/produto/380-0_380-1537.jpeg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene pessoal"],
                "nome"                   => "Bronzeador",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://www.nivea.com.br/media/catalog/product/cache/70ec1868154704062790b7d46bc8a69e/i/m/image_01_oh6ucikwtp7juwjy.jpg",
            ],
            // Higiene bucal
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene bucal"],
                "nome"                   => "Escova de dente",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://images-americanas.b2w.io/produtos/2436514491/imagens/escova-de-dentes-oral-b-carvao-pack-4-unidades/2436514504_1_large.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene bucal"],
                "nome"                   => "Pasta de dente",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://images-americanas.b2w.io/produtos/5845655834/imagens/kit-pasta-de-dente-sensodyne-rapido-alivio-para-dentes-sensiveis-com-3-unidades/5845655834_1_large.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene bucal"],
                "nome"                   => "Antisséptico bucal",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://s3.amazonaws.com/img.iluria.com/product/4F22FF/1804F1F/450xN.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Higiene bucal"],
                "nome"                   => "Fio dental",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://io.convertiez.com.br/m/drogal/shop/products/images/5748577/medium/fio-dental-encerado-colgate-50-metros_78562.jpg",
            ],
            // Limpeza p/ casa
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Limpeza p/ casa"],
                "nome"                   => "Desinfetante",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://io.convertiez.com.br/m/superpaguemenos/shop/products/images/36972/medium/desinf-pinho-sol-1l-2xpoder-original_88383.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Limpeza p/ casa"],
                "nome"                   => "Água sanitária",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://d2ng48q17pwd8f.cloudfront.net/Custom/Content/Products/10/19/1019335_agua-sanit-alvex-2l-5571_m1_637483937605423192.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Limpeza p/ casa"],
                "nome"                   => "Detergente",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://cdn.awsli.com.br/600x1000/1027/1027618/produto/139849825/detergente-flops-neutro-500ml-9d3f3804a2.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Limpeza p/ casa"],
                "nome"                   => "Esponja p/ louça",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://www.upmais.com.br/media/catalog/product/cache/1/image/525x525/9df78eab33525d08d6e5fb8d27136e95/e/s/esponja.jpeg",
            ],
            // Inseticida
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Inseticida"],
                "nome"                   => "Inseticida",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://http2.mlstatic.com/D_NQ_NP_777811-MLB54414140204_032023-O.webp",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Inseticida"],
                "nome"                   => "Repelente",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://static.jetfarma.com.br/media/catalog/product/cache/928a8c279c399d896117ba62b5912c8a/s/h/shopping.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Inseticida"],
                "nome"                   => "Repelente elétrico",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://a-static.mlcdn.com.br/450x450/repelente-eletrico-liquido-sbp-45-noites-novo-aparelho-refil/apoteca/012270/84cac730dc66d3bfec9439aee76ff85b.jpeg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Inseticida"],
                "nome"                   => "Desengordurante",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://img.sitemercado.com.br/produtos/16eb49699e983401672e66ad87b7660acc887fae25bc0af68e2b9d17f69f0fb1_full.jpg",
            ],

            // Frios
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frios"],
                "nome"                   => "Queijo",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://dcdn.mitiendanube.com/stores/001/275/310/products/loja__0003s_0001_07-queijo-gruyere1-06074065446fbf220015977838350426-640-0.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frios"],
                "nome"                   => "Iogurte",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://io.convertiez.com.br/m/superpaguemenos/shop/products/images/13468/medium/iogurte-natural-batavo-pedacos-de-morango-500g_76606.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frios"],
                "nome"                   => "Manteiga",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://catupiry.com.br/wp-content/uploads/2022/09/MANTEIGA-EXTRA-SEM-SAL-CATUPIRY-300x300.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frios"],
                "nome"                   => "Margarina",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://img.sitemercado.com.br/produtos/6e06f39ec548e3e971149f3e55ed06cdc3122f7b2cc24f0ab23fe9c854ade1f7_full.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frios"],
                "nome"                   => "Requeijão",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://img.sitemercado.com.br/produtos/3e9a1762f6ee5b51531dc329588f52f91a6236ffa2865d463615def4cbee11d8_hero_full.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frios"],
                "nome"                   => "Nuggets",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://casadecarnesdomaninho.com.br/wp-content/uploads/2022/06/nuggtes.jpeg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frios"],
                "nome"                   => "Empanados",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://i.ytimg.com/vi/J0QkAIokXZs/sddefault.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frios"],
                "nome"                   => "Prato pronto",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://images-americanas.b2w.io/produtos/4295757704/imagens/lasanha-congelada-calabresa-seara-600g/4295757704_1_large.jpg",
            ],
            // Carnes
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Carnes"],
                "nome"                   => "Carne vermelha",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://static1.minhavida.com.br/articles/82/ee/62/6c/carne-vermelha3-orig-1.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Carnes"],
                "nome"                   => "Frango",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://assets.vtex.app/unsafe/600x600/center/middle/https%3A%2F%2Fcarrefourbrfood.vtexassets.com%2Farquivos%2Fids%2F35221283%2F32751_1.jpg%3Fv%3D637800064725000000",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Carnes"],
                "nome"                   => "Salsichão",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://redemix.vteximg.com.br/arquivos/ids/214741-500-500/7894904727186.png?v=638354978973530000",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Carnes"],
                "nome"                   => "Salsicha",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://io.convertiez.com.br/m/superpaguemenos/shop/products/images/24310/medium/salsicha-seara-kg_90810.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Carnes"],
                "nome"                   => "Peixe",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://img.sitemercado.com.br/produtos/0a14057af8c6c265fe0afa09c0e40fb7d320c06ef33619194e3828e093a1179f_full.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Carnes"],
                "nome"                   => "Ovos",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://deskontao.agilecdn.com.br/3547_1.jpg",
            ],

            // Frutas
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Maçã",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://www.unimednordesters.com.br/media/15714/beneficios-da-maca.jpeg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Banana",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://acdn.mitiendanube.com/stores/034/476/products/banana-prata1-697a68c7da6322edf115804203705497-640-0.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Abacaxi",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://acdn.mitiendanube.com/stores/001/194/977/products/abacaxi-perola11-d39b14434678c43cc815897563419666-640-0.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Abacate",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://www.svicente.com.br/on/demandware.static/-/Sites-storefront-catalog-sv/default/dwc75d12af/Produtos/20940-0000000002094-abacate%20kg-flv-1.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Pera",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://static3.tcdn.com.br/img/img_prod/450860/muda_de_pera_d_agua_ou_europeia_1m_enxertada_676_1_20190611093602.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Coco",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://scfoods.fbitsstatic.net/img/p/coco-seco-unidade-70711/257229.jpg?w=800&h=800&v=no-change&qs=ignore",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Carambola",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://naturaldaterra.com.br/media/catalog/product/1/0/100101-carambola-porcao.jpg?auto=webp&format=pjpg&width=640&height=800&fit=cover",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Kiwi",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://images.tcdn.com.br/img/img_prod/924009/kiwi_129_1_747cd5f775f304e08b3b2f0eabe55539.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Mamão",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://hortifruti.com.br/media/catalog/product/1/0/100178---2002060000004---mamao-papaia.jpg?auto=webp&format=pjpg&width=640&height=800&fit=cover",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Manga",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://media.istockphoto.com/id/450724125/pt/foto/manga.jpg?s=612x612&w=0&k=20&c=lXTbD83Pz2zhE66n5ED9_47h4lGhCOU6tV5eoUqWdq8=",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Uva",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://cdn.awsli.com.br/600x450/1294/1294025/produto/62683007/4bcd77e6c6.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Melancia",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://scfoods.fbitsstatic.net/img/p/melancia-mini-unidade-70680/257182.jpg?w=800&h=800&v=no-change&qs=ignore",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Amora",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://images.tcdn.com.br/img/img_prod/694142/muda_de_amora_gigante_1987_1_36fe1ba3c9c64dda347ee48dc0364fa9.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Mirtilo",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://acdn.mitiendanube.com/stores/001/194/977/products/mirtilo1-763767cf8dc5b6ca9c15899111001816-480-0.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Laranja",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://acdn.mitiendanube.com/stores/746/397/products/laranja-valenciana1-d6176b7996359e3cb815221646757150-640-0.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Limão",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://static.significados.com.br/foto/limao-taiti-cke.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Morango",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://io.convertiez.com.br/m/trimais/shop/products/images/4983/medium/morango-bandeja-250g_4923.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Goiaba",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://savegnagoio.vtexassets.com/arquivos/ids/353920-800-450?v=638080435664030000&width=800&height=450&aspect=true",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Frutas"],
                "nome"                   => "Maracujá",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://scfoods.fbitsstatic.net/img/p/maracuja-azedo-unidade-70685/257195.jpg?w=800&h=800&v=no-change&qs=ignore",
            ],
            // Hortifruti
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Hortifruti"],
                "nome"                   => "Nozes",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://cdn.awsli.com.br/600x450/422/422230/produto/16568901/e39d269bae.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Hortifruti"],
                "nome"                   => "Alho",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://naturaldaterra.com.br/media/catalog/product/1/2/120947-alho-nacional-beneficiado-unidade.jpg?auto=webp&format=pjpg&width=640&height=800&fit=cover",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Hortifruti"],
                "nome"                   => "Alho poró",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://cdn.awsli.com.br/600x700/305/305913/produto/10293477/alho-poro-2efb3f2b.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Hortifruti"],
                "nome"                   => "Amendoim",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://images-americanas.b2w.io/produtos/1252571002/imagens/amendoim-japones-320g-dori/1252571002_1_large.jpg",
            ],
            // Legumes
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Alface",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://caminhoverdehortifruti.com.br/image/cache/data/2D1ABA2E-7D06-4EE9-8F78-934D75DCDD29-500x500.jpeg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Brócolis",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://hortifrutirecife.com.br/image/cache/catalog/produtos/BROCOLIS%20NINJA-637x637.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Tomate",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://img.freepik.com/fotos-premium/vegetais-de-tomate-isolados-no-branco-trajeto-de-grampeamento-da-fruta-do-tomate-fresco-foto-macro-de-tomate_299651-601.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Beterraba",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://campeol.com.br/fotos/1/1/shutterstock_1195597369.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Cenoura",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://scfoods.fbitsstatic.net/img/p/cenoura-500g-70619/257121.jpg?w=800&h=800&v=no-change&qs=ignore",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Nabo",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://www.quitandatomio.com.br/upload/274714611-nabo-conheca-os-beneficios-desse-legume-que-ajuda-na-saude-do-coracao.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Pimentão",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://acdn.mitiendanube.com/stores/174/441/products/g3347141-27fb2e21da71b5f7b415675237458814-640-0.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Pimenta",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://fortatacadista.vteximg.com.br/arquivos/ids/290984-800-800/696579.jpg?v=637505465409030000",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Champignon",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://cogucci.com.br/65-large_default/champignon-de-paris-200g.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Chuchu",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://d2ng48q17pwd8f.cloudfront.net/Custom/Content/Products/10/02/1002762_chuchu-400g-16569_m2_638129314573592802.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Milho",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://hortifruti.com.br/media/catalog/product/1/3/139833-milho-verde-organico-unidade.jpg?auto=webp&format=pjpg&width=640&height=800&fit=cover",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Ervilha",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://armazemsaovito.fbitsstatic.net/img/p/ervilha-inteira-160845/357922.jpg?w=344&h=344&v=no-change&qs=ignore",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Palmito",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://uaiagro.com.br/wp-content/uploads/2021/09/palmito_pupunha_in_natura_400g_227_1_e6f8f23b4ee45ce01edb42325bbab253-e1631295533672.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Vagem",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://io.convertiez.com.br/m/superpaguemenos/shop/products/images/17787/medium/vagem-kg_11774.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Pepino",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://io.convertiez.com.br/m/superpaguemenos/shop/products/images/40950/medium/pepino-pconserva-mini-kg_96400.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Batata",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://scfoods.fbitsstatic.net/img/p/batata-lavada-500g-70629/257131.jpg?w=800&h=800&v=no-change&qs=ignore",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Batata doce",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://hortifruti.com.br/media/catalog/product/1/4/146961---2106100000006---batata-doce-pcs-kg.jpg?auto=webp&format=pjpg&width=640&height=800&fit=cover",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Gengibre",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://www.fsp.usp.br/sustentarea/wp-content/uploads/2022/06/gengibre-kg-0000000057233.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Cebola",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://cdn.awsli.com.br/600x700/305/305913/produto/10293544/cebola-1d05720a.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Aspargo",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://scfoods.fbitsstatic.net/img/p/aspargos-verde-importado-300g-70630/257132.jpg?w=800&h=800&v=no-change&qs=ignore",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Beringela",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://lh3.googleusercontent.com/proxy/oGeQedYXuO9v5uPtn5_Jjte_-KeQMR8nWLnl2HUuQtuGXiLoYksbqbDuFSKewxXY1RwnCGr7qytwnW0eSro2iqn9ysrwvki41IlcA0O7Q6QQ6NwQdtg7",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Mandioca",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://io.convertiez.com.br/m/superpaguemenos/shop/products/images/16410/medium/mandioca-kg_11282.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Cebolinha",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://lojaqui.com.br/images/produtos/site/55257.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Espinafre",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://organicossaocarlos.com.br/wp-content/uploads/2019/07/espinafre.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Agrião",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://scfoods.fbitsstatic.net/img/p/agriao-hidroponico-unidade-70665/257167.jpg?w=800&h=800&v=no-change&qs=ignore",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Legumes"],
                "nome"                   => "Rúcula",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://ibassets.com.br/ib.item.image.big/b-cd762ee0c19843a4ac13ef0b0084014a.jpeg",
            ],
            
            // Padaria
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Cacetinho",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://lh3.googleusercontent.com/proxy/8B4WcXw1RgjHg6oklcEesUziqDQzsm30eDxIbojd9hwBXxQj5VrVvvITUJRIbc_K7qIb4OG3EVaKPgtHaeAKvzUNicMZg-oodDwy5Sr6LYAt7z5BBytrNTyaefDMVZvkaYVhP2D5YCqN9H7aWB2-sa3b2duej1WZFpqXIRDsYwGfQsMi",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Pão de hambúrger",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://www.bernardaoemcasa.com.br/media/catalog/product/cache/1/image/500x500/9df78eab33525d08d6e5fb8d27136e95/2/9/2964071345fb0e6bf6.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Pão de sanduíche",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://superpao.vtexassets.com/arquivos/ids/353676/Pao-De-Sanduiche-Kg.jpg?v=638374846035500000",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Pão de cachorro quente",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://www.cozinhadonabenta.com.br/wp-content/uploads/2019/05/PAO-PARA-HOT-DOG-Correta.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Pão sírio",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://cdnv2.moovin.com.br/bancadoholandes/imagens/produtos/det/94631ec3bcca6731c28e3b55f35690f4125dd43b.jpeg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Pão bisnaguinha",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://acdn.mitiendanube.com/stores/001/167/768/products/pao-bisnaguinha-ind-bisnaguito-pct-300g1-e496849cb38071aeb115944794666439-640-0.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Panetone",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://t2.uc.ltmcdn.com/pt/posts/4/2/6/como_fazer_panetone_caseiro_20624_600_square.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Bolo",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://homechefs.com.br/blog/wp-content/uploads/Massabolo.png",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Pão de mel",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://harald.com.br/wp-content/uploads/2018/04/pao-de-mel-fofinho-700x520-1.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Rosquinha de polvilho",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://www.sumerbol.com.br/uploads/images/2017/04/rosquinha-de-polvilho-1491853384.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Crocantíssimo",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://loja16.bistek.com.br/media/catalog/product/cache/3d8b1eb10e2235e6c16b8d8d169667e5/1/7/1781260_2.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Padaria"],
                "nome"                   => "Massa de pizza",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://cdn0.tudoreceitas.com/pt/posts/6/7/7/massa_de_pizza_simples_3776_600.jpg",
            ],

            // Sobremesas
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Sobremesas"],
                "nome"                   => "Chocolate",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://static.lojavirtual.flusshaus.com.br/public/flusshaus/imagens/produtos/barra-de-chocolate-70-cacau-100g-969.jpg",
            ],
            [
                "uuid"                   => uuid(),
                "categoria_id"           => $this->categorias["Sobremesas"],
                "nome"                   => "Marshmallow",
                "descricao"              => "",
                "informacao_nutricional" => "",
                "image_link"             => "https://cdn.dooca.store/3628/products/marshmallow-fofs-twist-colorido-em-tiras_640x640+fill_ffffff.jpg?v=1660681202&webp=0",
            ],

            // Diet/Fitness

            // Álcool

            // Sucos

            // Refrigerantes

            // Chás

            // Café

            // Leite

            // Aditivo

            // Limpeza automotiva

            // Smartphones

            // Hardware

            // TVs

            // Som

            // Periféricos

            // Quarto

            // Cozinha

            // Sala de estar

            // Banheiro

            // Escritório

            // Sala de jantar

            // Varanda

            // Ração

            // Petisco

            // Higiene

            // Remédio

            // Primeiro socorros
        ];

        DB::table("produtos")->insert($produtos);
    }

    private function getCategorias()
    {
        $cat = DB::table("categorias_produtos")->get();

        foreach($cat as $row) {
            $this->categorias[$row->nome] = $row->id;
        }
    }
}
