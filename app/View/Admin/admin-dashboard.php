<section x-data="{open : true}">
    <div class="container mx-auto px-4 py-4 lg:px-20 lg:py-28">
        <div class="mt-12 lg:mt-0">
            <div class="flex items-center justify-center">
                <div class="w-3/4 lg:w-2/4">
                    <h1 class="font-rubik font-medium text-4xl text-center mb-4">Dashboard</h1>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-20 h-20 mx-auto text-merah mb-12">
                <path d="M12 9a1 1 0 01-1-1V3c0-.553.45-1.008.997-.93a7.004 7.004 0 015.933 5.933c.078.547-.378.997-.93.997h-5z" />
                <path d="M8.003 4.07C8.55 3.992 9 4.447 9 5v5a1 1 0 001 1h5c.552 0 1.008.45.93.997A7.001 7.001 0 012 11a7.002 7.002 0 016.003-6.93z" />
            </svg>

            <div class="flex flex-wrap -m-4">
                <!-- card -->
                <div class="p-4 w-full sm:w-1/3">
                    <div class="h-full shadow-xl rounded-lg overflow-hidden">
                        <div class="py-4 px-6">
                            <h1 class="font-semibold text-2xl text-center">Pesanan</h1>
                        </div>
                        <div class="py-4 px-6 space-y-2">
                            <div class="border-2 border-abu py-4 px-6 rounded-lg bg-dark-white">
                                <p class="font-rubik font-medium text-xl text-center"><?=$model['count_transactions']?></p>
                            </div>
                            <div>
                                <a href="/admin/transactions">
                                    <div class="py-4 px-6 rounded-lg bg-merah text-white transition duration-200 ease-in">
                                        <p class="font-rubik font-medium text-xl text-center">Lihat</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card -->
                <div class="p-4 w-full sm:w-1/3">
                    <div class="h-full shadow-xl rounded-lg overflow-hidden">
                        <div class="py-4 px-6">
                            <h1 class="font-semibold text-2xl text-center">Produk</h1>
                        </div>
                        <div class="py-4 px-6 space-y-2">
                            <div class="border-2 border-abu py-4 px-6 rounded-lg bg-dark-white">
                                <p class="font-rubik font-medium text-xl text-center"><?=$model['count_products']?></p>
                            </div>
                            <div>
                                <a href="/admin/products">
                                    <div class=" py-4 px-6 rounded-lg bg-merah text-white transition duration-200 ease-in">
                                        <p class="font-rubik font-medium text-xl text-center">Lihat</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card -->
                <div class="p-4 w-full sm:w-1/3">
                    <div class="h-full rounded-lg shadow-xl overflow-hidden">
                        <div class="py-4 px-6">
                            <h1 class="font-semibold text-2xl text-center">Profil</h1>
                        </div>
                        <div class="py-4 px-6 space-y-2">
                            <div class="border-2 border-abu py-4 px-6 rounded-lg bg-dark-white">
                                <p class="font-rubik font-medium text-xl text-center"><?=$model['admin']->name?></p>
                            </div>
                            <div>
                                <a href="/admin/profile">
                                    <div class="py-4 px-6 rounded-lg bg-merah text-white transition duration-200 ease-in">
                                        <p class="font-rubik font-medium text-xl text-center">Ubah</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card -->
                <div class="p-4 w-full sm:w-1/3">
                    <div class="h-full rounded-lg shadow-xl overflow-hidden">
                        <div class="py-4 px-6">
                            <h1 class="font-semibold text-2xl text-center">Admin</h1>
                        </div>
                        <div class="py-4 px-6 space-y-2">
                            <div class="border-2 border-abu py-4 px-6 rounded-lg bg-dark-white">
                                <p class="font-rubik font-medium text-xl text-center"><?=$model['count_admin']?></p>
                            </div>
                            <div>
                                <a href="/admin/account">
                                    <div class="py-4 px-6 rounded-lg bg-merah text-white transition duration-200 ease-in">
                                        <p class="font-rubik font-medium text-xl text-center">Lihat</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- card -->
                <div class="p-4 w-full sm:w-1/3">
                    <div class="h-full rounded-lg shadow-xl overflow-hidden">
                        <div class="py-4 px-6">
                            <h1 class="font-semibold text-2xl text-center">Laporan bulanan</h1>
                        </div>
                        <div class="py-4 px-6 space-y-2">
                            <div class="border-2 border-abu py-4 px-6 rounded-lg bg-dark-white">
                                <p class="font-rubik font-medium text-xl text-center">laporan hari ini</p>
                            </div>
                            <div>
                                <a href="/admin/statistics">
                                    <div class="py-4 px-6 rounded-lg bg-merah text-white transition duration-200 ease-in">
                                        <p class="font-rubik font-medium text-xl text-center">Lihat</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>