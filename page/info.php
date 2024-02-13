<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css" />
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #354b8f;
        }

        .container {
            display: flex;
            max-width: 900px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .cards {
            width: 250px;
            margin: 10px;
            background: #fff;
            box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2);
            padding: 15px;
            border-radius: 15px;
            height: auto;
            transition: all 0.3s;
        }

        .card-body h5 {
            text-align: center;
        }

        .card-body p {
            text-align: left;
            padding: 10px;
        }

        @media screen and (max-width: 680px) {
            .cards {
                width: 80%;
            }
        }

        .blog-slider {
            width: 95%;
            position: relative;
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2);
            padding: 25px;
            border-radius: 25px;
            height: 350px;
            transition: all 0.3s;
        }

        @media screen and (max-width: 992px) {
            .blog-slider {
                max-width: 680px;
                height: 400px;
            }
        }

        @media screen and (max-width: 768px) {
            .blog-slider {
                min-height: 500px;
                height: auto;
                margin: 100px auto;
            }
        }

        @media screen and (max-height: 500px) and (min-width: 992px) {
            .blog-slider {
                height: 350px;
            }
        }

        .blog-slider__item {
            display: flex;
            align-items: center;
        }

        @media screen and (max-width: 768px) {
            .blog-slider__item {
                flex-direction: column;
            }
        }

        .blog-slider__item.swiper-slide-active .blog-slider__img img {
            opacity: 1;
            transition-delay: 0.3s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>* {
            opacity: 1;
            transform: none;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(1) {
            transition-delay: 0.3s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(2) {
            transition-delay: 0.4s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(3) {
            transition-delay: 0.5s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(4) {
            transition-delay: 0.6s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(5) {
            transition-delay: 0.7s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(6) {
            transition-delay: 0.8s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(7) {
            transition-delay: 0.9s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(8) {
            transition-delay: 1s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(9) {
            transition-delay: 1.1s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(10) {
            transition-delay: 1.2s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(11) {
            transition-delay: 1.3s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(12) {
            transition-delay: 1.4s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(13) {
            transition-delay: 1.5s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(14) {
            transition-delay: 1.6s;
        }

        .blog-slider__item.swiper-slide-active .blog-slider__content>*:nth-child(15) {
            transition-delay: 1.7s;
        }

        .blog-slider__img {
            width: 200px;
            flex-shrink: 0;
            height: 200px;
            border-radius: 20px;
            transform: translateX(-50px);
            overflow: hidden;
        }

        .blog-slider__img:after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 20px;
            opacity: 0.8;
        }

        .blog-slider__img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            opacity: 0;
            border-radius: 20px;
            transition: all 0.3s;
        }

        @media screen and (max-width: 768px) {
            .blog-slider__img {
                transform: translateY(-50%);
                width: 90%;
            }
        }

        @media screen and (max-width: 576px) {
            .blog-slider__img {
                width: 95%;
            }
        }

        @media screen and (max-height: 500px) and (min-width: 992px) {
            .blog-slider__img {
                height: 270px;
            }
        }

        .blog-slider__content {
            padding-right: 25px;
        }

        @media screen and (max-width: 768px) {
            .blog-slider__content {
                margin-top: -80px;
                text-align: center;
                padding: 0 30px;
            }
        }

        @media screen and (max-width: 576px) {
            .blog-slider__content {
                padding: 0;
            }
        }

        .blog-slider__content>* {
            opacity: 0;
            transform: translateY(25px);
            transition: all 0.4s;
        }

        .blog-slider__title {
            font-size: 24px;
            font-weight: 700;
            color: #0d0925;
            margin-bottom: 20px;
        }

        .blog-slider__text {
            color: #4e4a67;
            margin-bottom: 30px;
            line-height: 1.5em;
        }

        .blog-slider .swiper-container-horizontal>.swiper-pagination-bullets,
        .blog-slider .swiper-pagination-custom,
        .blog-slider .swiper-pagination-fraction {
            bottom: 10px;
            left: 0;
            width: 100%;
        }

        .blog-slider__pagination {
            position: absolute;
            z-index: 21;
            right: 20px;
            width: 11px !important;
            text-align: center;
            left: auto !important;
            top: 50%;
            bottom: auto !important;
            transform: translateY(-50%);
        }

        @media screen and (max-width: 768px) {
            .blog-slider__pagination {
                transform: translateX(-50%);
                left: 50% !important;
                top: 135px;
                width: 100% !important;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }

        .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
            margin: 8px 0;
        }

        @media screen and (max-width: 768px) {
            .blog-slider__pagination.swiper-pagination-bullets .swiper-pagination-bullet {
                margin: 0 5px;
            }
        }

        .blog-slider__pagination .swiper-pagination-bullet {
            width: 5px;
            height: 5px;
            display: block;
            border-radius: 10px;
            background: #062744;
            opacity: 0.2;
            transition: all 0.3s;
        }

        .blog-slider__pagination .swiper-pagination-bullet-active {
            opacity: 1;
            background: #000000;
            height: 10px;
            box-shadow: 0px 0px 20px rgba(252, 56, 56, 0.3);
        }

        @media screen and (max-width: 768px) {
            .blog-slider__pagination .swiper-pagination-bullet-active {
                height: 5px;
                width: 10px;
            }
        }
    </style>
</head>

<body>
    <div style="text-align: center; margin-top: 20px">
        <header>
            <h2>TENTANG LONGSOR</h2>
        </header>
    </div>

    <br />
    <div class="blog-slider">
        <div class="blog-slider__wrp swiper-wrapper">
            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="https://asset.kompas.com/crops/XO8EJtGQA6lnC7QTK2kjRirz1sM=/0x0:800x533/750x500/data/photo/2018/05/28/1612135860.jpg" alt="Foto Milik Kompas.com" />
                </div>
                <div class="blog-slider__content">
                    <div class="blog-slider__title">
                        Kenapa Bengkulu Sering Mengalami Longsor?
                    </div>
                    <div class="blog-slider__text">
                        Bengkulu sering mengalami longsor karena faktor geografis dan
                        cuaca. Bengkulu terletak di daerah pegunungan dan memiliki curah
                        hujan yang tinggi. Hal ini menyebabkan tanah menjadi labil dan
                        mudah longsor. Selain itu, penebangan hutan yang tidak terkontrol
                        juga menjadi penyebab longsor di Bengkulu.
                    </div>
                </div>
            </div>

            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="https://img.okezone.com/content/2016/02/02/340/1303241/diterjang-longsor-dan-pohon-tumbang-jalinbar-bengkulu-lumpuh-fdpKp0tSqq.jpg" alt="Foto Milik Okezone.com" />
                </div>
                <div class="blog-slider__content">
                    <div class="blog-slider__title">
                        Bagaimana Bisa Terjadi Longsor?
                    </div>
                    <div class="blog-slider__text">
                        Longsor adalah sebuah peristiwa geologi yang terjadi karena adanya
                        pergerakan massa batuan atau tanah yang pergerakkannya jatuh ke
                        bawah. Pada umumnya tanah longsor disebabkan oleh 2 faktor yaitu
                        faktor pendorong dan faktor pemicu. Proses terjadinya tanah
                        longsor dapat terjadi apabila air yang meresap ke dalam tanah
                        menyebabkan bobot tanah bertambah, kemudian menembus sampai ke
                        bidang gelincir, hingga menyebabkannya bergerak keluar lereng.
                        Apabila gaya pendorong pada lereng lebih besar dari gaya penahan
                        maka terjadilah longsor.
                    </div>
                </div>
            </div>

            <div class="blog-slider__item swiper-slide">
                <div class="blog-slider__img">
                    <img src="https://cdn-2.tstatic.net/tribunnews/foto/bank/images/tanah-longsor-di-kawasan-menuju-wisata-gunung-bromo_20150202_081428.jpg" alt="Foto Milik cdn-2.tstatic.net" />
                </div>
                <div class="blog-slider__content">
                    <div class="blog-slider__title">Bagaimana Mencegah Longsor?</div>
                    <div class="blog-slider__text">
                        Ada beberapa cara yang dapat Anda lakukan untuk mengurangi risiko
                        terjadinya longsor yaitu tidak membuat kolam atau sawah di atas
                        lereng karena dapat meningkatkan tekanan air pada tanah dan
                        membuatnya mudah bergeser, tidak menebang pohon atau merusak hutan
                        secara liar karena dapat mengurangi daya dukung tanah dan
                        meningkatkan erosi, membuat terasering atau dinding penahan untuk
                        mengurangi kemiringan lereng dan menstabilkan tanah.
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-slider__pagination"></div>
    </div>

    <div class="container">
        <div class="cards">
            <div class="card-body">
                <h5>Longsoran Translasi</h5>
                <p>
                    Tanah longsor jenis ini merupakan kondisi dimana bergeraknya
                    material tanah pada kondisi tanah yang bertopografi rata atau
                    menggelombang landai. Jadi, pada daerah tanah yang landai pun bisa
                    terjadi tanah longsor ini terutama jika berbagai penyebab tanah
                    longsor sudah mulai nampak.
                </p>
            </div>
        </div>
        <div class="cards">
            <div class="card-body">
                <h5>Longsoran Rotasi</h5>
                <p>
                    Dinamakan demikian karena longsoran ini merupakan pergerakan
                    material tanah yang terjadi di dalam bidang yang berbentuk cekung
                    sehingga seringkali terjadi perputaran atau rotasi di dalam bidang
                    cekung tersebut. Pada bidang cekung yang terkena longsoran dapat
                    menjadi hal yang sangat berbahaya apalagi jika ada pemukiman di
                    atasnya karena akan rawa tertimbun dan mengakibatkan korban jiwa.
                </p>
            </div>
        </div>
        <div class="cards">
            <div class="card-body">
                <h5>Pergerakan Blok</h5>
                <p>
                    Pergerakan blok ini merupakan pergerakan batuan yang ada di dalam
                    tanah pada bidang yang datar atau landai. Kondisi ini juga
                    seringkali dinamakan degan longsorann blok batu dengan jumlah batu
                    yang biasanya tidak sedikit. Ini akan sangat berbahaya bagi manusia
                    jika terkena longsoran ini karena sebagian besar materialnya adalah
                    batuan.
                </p>
            </div>
        </div>
        <div class="cards">
            <div class="card-body">
                <h5>Runtuhan Batu</h5>
                <p>
                    Seperti namanya, runtuhan batu ini merupakan kondisi dimana terjadi
                    runtuhan batu secara langsung dan terjun bebas dari atas ke bawah.
                    Hal ini biasanya terjadi pada bukit yang terjal dengan lereng yang
                    cukup curam dan ini sering ditemukan di tebing pantai. Jika di bawah
                    tebing ini terdapat pemukiman warga maka akan sangat berbahaya
                    karena material yang jatuh biasanya berupa batu besar yang pasti
                    akan membuat kerusakan pada apa yang dijatuhinya.
                </p>
            </div>
        </div>
        <div class="cards">
            <div class="card-body">
                <h5>Rayapan Tanah</h5>
                <p>
                    Tanah longsor ini terjadi karena adanya rayapan atau pergerakan
                    tanah yang sangat lambat dan halus. Ini biasanya terjadi pada tanah
                    yang memiliki butiran kecil halus dan namun memiliki struktur yang
                    cukup kasar. Biasanya jenis tanah longsor ini hampir tidak bisa
                    dikenali dan kalau longsor sudah terjadi dalam waktu yang cukup lama
                    baru bisa dikenali dengan miringnya tiang-tiang listrik, rumah dan
                    lainnya yang berada di atasnya.
                </p>
            </div>
        </div>
        <div class="cards">
            <div class="card-body">
                <h5>Aliran Bahan Rombakan</h5>
                <p>
                    Kondisi ini terjadi karena adanya pergerakan tanah dan metarialnya
                    yang disebabkan oleh dorongan air yang sangat kuat. Kecepatan dari
                    aliran air sendiri akan sangat tergantung pada kemiringan lereng,
                    volume air, tekanan air, kecepatan air serta jenis material tanahnya
                    itu sendiri apakah mudah terangkut oleh air atau tidak. Jenis tanah
                    longsor ini biasanya terjadi pada lereng gunung berapi dan
                    menyebabkan banyaknya korban jiwa.
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js">
    </script>
    <script type="text/javascript">
        var swiper = new Swiper(".blog-slider", {
            spaceBetween: 30,
            effect: "fade",
            loop: true,
            mousewheel: {
                invert: false,
            },
            // autoHeight: true,
            pagination: {
                el: ".blog-slider__pagination",
                clickable: true,
            },
        });
    </script>
</body>

</html>