    <!-- add product -->
    <section x-data="{open : true}">
        <div class="container w-9/12 mx-auto px-4 py-4 lg:px-20 lg:py-28 mt-12 lg:mt-0">
            <?php if (isset($model['error'])) { ?>
                <div x-show="open" class="flex flex-row bg-red-600 rounded-md opacity-50 py-3 px-5 items-center justify-between" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    <h1 class="text-white text-lg"><?= $model['error'] ?></h1>
                    <button @click="open = !open" class="border-2 border-inherit text-white py-2 px-4 rounded-full">X</button>
                </div>
            <?php } ?>
            <div class="grid grid-cols-12 items-center">
                <div class="col-span-12 items-center justify-center">
                    <h1 class="font-rubik font-medium text-[38px] text-center mb-4">Tambah produk</h1>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-20 h-20 mx-auto text-merah">
                        <path fill-rule="evenodd" d="M7.5 6v.75H5.513c-.96 0-1.764.724-1.865 1.679l-1.263 12A1.875 1.875 0 004.25 22.5h15.5a1.875 1.875 0 001.865-2.071l-1.263-12a1.875 1.875 0 00-1.865-1.679H16.5V6a4.5 4.5 0 10-9 0zM12 3a3 3 0 00-3 3v.75h6V6a3 3 0 00-3-3zm-3 8.25a3 3 0 106 0v-.75a.75.75 0 011.5 0v.75a4.5 4.5 0 11-9 0v-.75a.75.75 0 011.5 0v.75z" clip-rule="evenodd" />
                    </svg>

                    <div class="relative py-10 w-full">
                        <div class="h-full rounded-lg py-10 shadow-xl">
                            <form method="post" action="/admin/add-products" enctype="multipart/form-data">
                                <div class="flex flex-col w-9/12 mx-auto gap-2">
                                    <label for="judul" class="font-semibold">Nama produk</label>
                                    <input type="text" name="products_name" class="font-rubik bg-dark-white py-2 rounded-md px-4" required placeholder="Nama produk">
                                </div>
                                <div class="flex flex-col w-9/12 mx-auto gap-2">
                                    <label class="block mt-4 font-semibold text-abu produk" for="file_input">Gambar</label>
                                    <input id="file_input" class="block w-full font-rubik text-abu rounded-md bg-dark-white file:bg-merah file:text-dark-white file:rounded-lg" name="products_images" type="file" required>
                                </div>
                                <div class="flex flex-col w-9/12 mx-auto gap-2">
                                    <label for="judul" class="font-semibold">Harga</label>
                                    <input type="number" name="products_price" class="font-rubik bg-dark-white py-2 rounded-md px-4" required placeholder="Harga produk">
                                </div>
                                <div class="flex flex-col w-9/12 mx-auto gap-2">
                                    <label for="judul" class="font-semibold">Stok</label>
                                    <input type="number" name="products_quantity" class="font-rubik bg-dark-white py-2 rounded-md px-4" required placeholder="Stok">
                                </div>
                                <div class="flex flex-col w-9/12 h-48 mx-auto gap-2">
                                    <label for="judul" class="font-semibold mt-2">Deskripsi produk</label>
                                    <textarea name="products_description" id="" cols="30" rows="10" class="bg-dark-white font-rubik rounded-md px-4" required placeholder="Deskripsi produk"></textarea>
                                </div>
                                <!-- <div class="flex flex-col w-9/12 mx-auto gap-2">
                                    <label for="judul" class="font-semibold mt-2">Kategori</label>
                                    <select name="category" id=""
                                        class="bg-dark-white font-semibold rounded-md py-2 px-4" required>
                                        <option value="Original" class="font-semibold">Original</option>
                                        <option value="Sambal goreng" class="font-semibold">Sambal goreng</option>
                                    </select>
                                </div> -->
                                <div class="w-9/12 mx-auto mt-4">
                                    <button class="bg-merah px-9 py-2 rounded-lg font-semibold text-white" type="submit">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>