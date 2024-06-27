<section>
    <div class="container w-9/12 p-4 py-20 mx-auto mt-12">
        <div class="flex items-center justify-center">
            <div class="w-3/4 lg:w-2/4">
                <h1 class="mb-4 text-4xl font-medium text-center font-rubik">Laporan</h1>
            </div>
        </div>
        <div class="shadow-md sm:rounded-lg" style="overflow: auto;">
            <?php if (isset($model['transactions']) && $model['transactions'] != null  && !isset($model['error'])) { ?>
                <table class="w-full overflow-x-scroll text-sm text-left text-gray-500 rtl:text-right bg-dark-white">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Id pesanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga satuan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Tanggal
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $total = 0; ?>
                        <?php foreach ($model['transactions'] as $row) { ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $row['tr_id'] ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $row['email'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $row['user_name'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $row['products_name'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $row['quantity'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $row['price'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $total = $row['price'] * $row['quantity'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= $row['transaction_time'] ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if ($row['status'] == "Ditolak") { ?>
                                        <span class="text-merah"><?= $row['status'] ?></span>
                                    <?php } else if($row['status'] == "Diproses"){ ?>
                                        <span style="color: orange;"><?= $row['status'] ?></span>
                                    <?php } else if($row['status'] == "Selesai" || $row['status'] == "Diterima"){ ?>
                                        <span style="color: green;"><?= $row['status'] ?></span>
                                        <?php } else {?>
                                            <?= $row['status'] ?>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
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