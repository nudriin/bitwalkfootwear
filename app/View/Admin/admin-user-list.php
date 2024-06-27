<section class="py-20">
    <div class="container w-9/12 p-4 py-20 mx-auto mt-12">
        <div class="flex items-center justify-center">
            <div class="w-3/4 lg:w-2/4">
                <h1 class="mb-4 text-4xl font-medium text-center font-rubik">Daftar User</h1>
            </div>
        </div>
        <?php if (isset($model['user']) && $model['user'] != null && !isset($model['error'])) { ?>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 rtl:text-right bg-dark-white">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Username
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nomor Telepon
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($model['user'] as $row) { ?>
                            <?php if ($row['role'] == "User") { ?>
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <?= $row['username'] ?>
                                    </th>
                                    <td class="px-6 py-4">
                                        <?= $row['name'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $row['email'] ?>
                                    </td>
                                    <td class="px-6 py-4">
                                        <?= $row['phone'] ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="flex items-center justify-center col-span-12">
                <div class="w-3/4 lg:w-2/4">
                    <h1 class="mb-4 text-3xl text-center"><?= $model['error'] ?></h1>
                </div>
            </div>
        <?php } ?>
</section>