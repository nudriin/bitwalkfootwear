<section x-data="{open : true}">
    <div class="container mx-auto w-full p-4 justify-center py-20 mb-12">
        <?php if (isset($model['error'])) { ?>
            <div x-show="open" class="flex flex-row bg-red-600 rounded-md opacity-50 py-3 px-5 items-center justify-between" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                <h1 class="text-white text-lg"><?= $model['error'] ?></h1>
                <button @click="open = !open" class="border-2 border-inherit text-white py-2 px-4 rounded-full">X</button>
            </div>
            <div class="flex items-center justify-center w-9/12 mx-auto">
                <img src="<?= getImage("vector/repair.jpg")?>" alt="" class="object-cover object-center w-full h-full">
            </div>
        <?php } ?>
        <div class="w-9/12 mx-auto">
            <div class="grid grid-cols-12 shadow-lg">
                <?php if (isset($model['products']) && $model['products'] != null && !isset($model['error'])) { ?>
                    <div class="col-span-12 lg:col-span-5">
                        <img src="<?= getUploadedImg("products/" . $model['products']->images) ?? 'https://dummyimage.com/600x400/f4f4f4/000000' ?>" alt="" class="object-cover object-center w-full h-72">
                    </div>
                    <div class="flex flex-col col-span-12 lg:col-span-7 p-6 gap-4">
                        <div class="flex flex-col gap-2">
                            <h1 class=" font-rubik font-medium text-2xl"><?= $model['products']->name ?></h1>
                            <p class="text-sm opacity-50">SKU : <?= $model['products']->id ?></p>
                            <p class="text-2xl">Rp. <?= $model['products']->price ?></p>
                            <p class="text-sm">Stok : <?= $model['products']->quantity ?></p>
                        </div>
                        <div class="flex gap-2">
                            <form action="/products/<?= $model['products']->id ?>" method="post">
                                <input type="hidden" name="products_id" value="<?= $model['products']->id ?>">
                                <input type="number" value="1" class="w-12 h-12 border-2 border-abu rounded-lg text-center" name="quantity" min="1" max="<?= $model['products']->quantity ?>">
                                <button type="submit" class="bg-merah rounded-lg py-2 px-4 text-dark-white">Masukan ke keranjang</button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>