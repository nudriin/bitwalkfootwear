    <!-- HEro section -->
    <section
        class="relative overflow-hidden py-20 bg-white before:absolute before:bottom-0 before:left-1/2 before:w-screen before:h-screen before:bg-hero-bg before:rounded-[50%] before:origin-bottom before:-translate-x-1/2 before:scale-150">
        <div class="relative z-10 w-full h-full">
            <div class="container w-9/12 px-4 py-4 mx-auto my-auto">
                <div class="grid items-center justify-center grid-cols-12 gap-4">
                    <div class="items-center justify-center order-2 w-full col-span-12 mt-20 lg:col-span-6 lg:order-1">
                        <h1
                            class="mt-0 lg:mt-4 mb-3 font-rubik font-semibold text-[60px] md:text-[60px] text-abu leading-tight text-center lg:text-left">
                            Paper Rex
                        </h1>
                        <p class="text-center lg:text-left text-[26px] leading-tight text-abu mb-1">"Menciptakan Jejak Gaya Berkualitas: Paper Rex, Pilihan Utama untuk Pakaian Berkualitas Tinggi."</p>
                        <p
                            class="text-center font-extralight lg:text-left text-[24px] leading-tight mb-4 text-abu">
                            Mari memulai eksplorasi!</p>
                        <div class="flex justify-center flex-col z-50 w-[263px]">
                            <button id="begin_tour"
                                class="px-9 py-4 bg-indigo-500 shadow-lg rounded-[19px] text-white font-semibold mb-12"><a href="/shop">Belanja Sekarang</a></button>
                        </div>
                    </div>
                    <div class="order-1 col-span-12 mt-12 lg:col-span-6 lg:order-2">
                        <div class="flex items-center justify-center">
                            <div class="w-full">
                                <div class="h-full">
                                    <img src="<?= getImage('/logo/prx.jpg') ?>" alt=""
                                        class="object-cover object-center w-[450px] h-[550px] rounded-[15px] shadow-xl shadow-indigo-500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Produk terlaris -->
    <section class="py-20">
        <div class="container justify-center w-full p-4 mx-auto mb-12">
            <div class="flex items-center justify-center w-9/12 mx-auto">
                <h1 class="mt-12 text-4xl font-medium font-rubik">
                    Produk kami
                </h1>
            </div>
            <div class="w-9/12 mx-auto">
                <?php if (isset($model['products']) && $model['products'] != null  && !isset($model['error'])) { ?>
                    <div class="flex flex-wrap justify-center mt-4 -m-4">
                        <?php if (sizeof($model['products']) >= 3) { ?>
                            <?php for ($i = 0; $i < 3; $i++) { ?>
                                <!-- card -->
                                <div class="w-full p-4 space-y-2 sm:w-1/2 md:1/3">
                                    <a href="/products/<?= $model['products'][$i]['id'] ?>">
                                        <div class="h-full overflow-hidden rounded-lg shadow-lg">
                                            <img src="<?= getUploadedImg("products/" . $model['products'][$i]['images']) ?? 'https://dummyimage.com/600x400/f4f4f4/000000' ?>" alt="" class="object-cover object-center w-full h-48">
                                            <div class="p-6 transition duration-200 ease-in hover:bg-merah hover:text-white">
                                                <h1 class="text-xl font-semibold"><?= $model['products'][$i]['name'] ?></h1>
                                                <p><?= $model['products'][$i]['price'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        <?php } else if (sizeof($model['products']) >= 2) { ?>
                            <?php for ($i = 0; $i < 2; $i++) { ?>
                                <div class="w-full p-4 space-y-2 sm:w-1/2 md:1/3">
                                    <a href="/products/<?= $model['products'][$i]['id'] ?>">
                                        <div class="h-full overflow-hidden rounded-lg shadow-lg">
                                            <img src="<?= getUploadedImg("products/" . $model['products'][$i]['images']) ?? 'https://dummyimage.com/600x400/f4f4f4/000000' ?>" alt="" class="object-cover object-center w-full h-48">
                                            <div class="p-6 transition duration-200 ease-in hover:bg-merah hover:text-white">
                                                <h1 class="text-xl font-semibold"><?= $model['products'][$i]['name'] ?></h1>
                                                <p><?= $model['products'][$i]['price'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php }  ?>
                        <?php } else if (sizeof($model['products']) >= 1) { ?>
                            <?php for ($i = 0; $i < 1; $i++) { ?>
                                <div class="w-full p-4 space-y-2 sm:w-1/2 md:1/3">
                                    <a href="/products/<?= $model['products'][$i]['id'] ?>">
                                        <div class="h-full overflow-hidden rounded-lg shadow-lg">
                                            <img src="<?= getUploadedImg("products/" . $model['products'][$i]['images']) ?? 'https://dummyimage.com/600x400/f4f4f4/000000' ?>" alt="" class="object-cover object-center w-full h-48">
                                            <div class="p-6 transition duration-200 ease-in hover:bg-merah hover:text-white">
                                                <h1 class="text-xl font-semibold"><?= $model['products'][$i]['name'] ?></h1>
                                                <p>Rp. <?= $model['products'][$i]['price'] ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php }  ?>
                        <?php }  ?>
                    </div>
                <?php } else { ?>
                    <div class="flex flex-col items-center justify-center col-span-12">
                        <div class="w-full">
                            <h1 class="mt-4 mb-4 text-3xl text-center"><?= $model['error'] ?></h1>
                        </div>
                        <div class="flex items-center justify-center w-9/12 mx-auto">
                            <img src="<?= getImage("vector/noProducts.jpg") ?>" alt="" class="object-cover object-center w-full h-full">
                        </div>
                    </div>
                <?php } ?>
            </div>
    </section>

    <section class="relative py-20 bg-hero-bg">
        <div class="container w-9/12 px-4 py-4 mx-auto lg:px-20 lg:py-28">
            <div class="grid items-center justify-center grid-cols-12 gap-5">
                <!-- Gmabar -->
                <div class="col-span-12 lg:col-span-6">
                    <div class="flex items-center justify-center w-full">
                        <div class="h-full">
                            <img src="<?= getImage("logo/paper_rex.jpg") ?>" class="object-cover object-center rounded-full" alt="">
                        </div>
                    </div>
                </div>
                <!-- about us -->
                <div class="items-center justify-center col-span-12 lg:col-span-6 text-abu">
                    <h1 class="mt-4 mb-4 text-4xl font-medium text-center font-rubik">Tentang kami</h1>
                    <p class="mt-4">Paper Rex adalah destinasi utama bagi para penggemar fashion yang menghargai kualitas tinggi. Sebagai reseller terkemuka, Paper Rex menampilkan koleksi pakaian terpilih dengan desain terbaru dan inovatif. Kami berkomitmen untuk memberikan pengalaman berbelanja yang memuaskan kepada pelanggan kami, memastikan setiap produk yang kami tawarkan tidak hanya memberikan gaya yang luar biasa tetapi juga kenyamanan yang tak tertandingi. Paper Rex, di mana setiap pakaian mewakili standar keunggulan dan gaya yang tak terkalahkan.</p>
                </div>
            </div>
        </div>
        <!-- <div class="absolute bottom-0 left-0 z-0">
            <img src="<?= getImage("bg/Bottom-hero.png") ?>" class="" alt="">
        </div> -->
    </section>