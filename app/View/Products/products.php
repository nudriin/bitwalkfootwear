<section>
    <div class="container mx-auto w-full p-4 justify-center mb-12">
        <div class="flex items-center justify-center w-9/12 mx-auto">
            <h1 class="font-rubik font-medium text-4xl mt-12">
                Daftar Produk
            </h1>
        </div>
        <div class="w-9/12 mx-auto">
            <?php if (isset($model['products']) && $model['products'] != null  && !isset($model['error'])) { ?>
                <div class="flex flex-wrap -m-4 mt-4 justify-center">
                    <?php foreach ($model['products'] as $row) { ?>
                        <!-- card -->
                        <div class="p-4 w-full sm:w-1/2 md:1/3 space-y-2">
                            <div class="h-full rounded-lg overflow-hidden shadow-lg">
                                <img src="<?= getUploadedImg("products/" . $row['images']) ?? 'https://dummyimage.com/600x400/f4f4f4/000000' ?>" alt="" class="h-48 object-cover w-full object-center">
                                <div class="p-6 hover:bg-merah hover:text-white transition duration-200 ease-in">
                                    <a href="/products/<?= $row['id'] ?>">
                                        <h1 class="font-semibold text-xl"><?= $row['name'] ?></h1>
                                        <p class="mb-4">Rp. <?= $row['price'] ?></p>
                                    </a>
                                    <div class="flex flex-row justify-end items-end gap-2">
                                        <label>
                                            <a onclick="return confirm('Anda yakin ingin menghapus produk ini? (<?= $row['name'] ?>)')" href="/admin/products/delete/<?= $row['id'] ?>" class="bg-merah border-2 border-white rounded-xl px-4 py-2 text-dark-white">Hapus</a>
                                        </label>
                                        <label><a href="/admin/products/edit/<?= $row['id'] ?>" class="bg-merah border-2 border-white rounded-xl px-4 py-2 text-dark-white">Edit</a></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="flex flex-col col-span-12 items-center justify-center">
                    <div class="w-full">
                        <h1 class="text-3xl text-center mb-4 mt-4"><?= $model['error'] ?></h1>
                    </div>
                    <div class="flex items-center justify-center w-9/12 mx-auto">
                        <img src="<?= getImage("vector/noProducts.jpg") ?>" alt="" class="object-cover object-center w-full h-full">
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>