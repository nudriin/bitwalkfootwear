<section>
    <div class="container mx-auto p-4 mt-12 py-20">
        <div class="flex items-center justify-center">
            <div class="w-3/4 lg:w-2/4">
                <h1 class="font-rubik font-medium text-4xl text-center mb-4">Admin</h1>
            </div>
        </div>
        <div class="flex items-center justify-center">
            <div class="w-3/4 lg:w-2/4">
                <h1 class="font-rubik font-medium text-xl text-center mb-4">Admin sedang login</h1>
            </div>
        </div>
        <?php if (isset($model['displayAdmin']) && isset($model['admin']) && $model['displayAdmin'] != null && $model['admin'] != null && !isset($model['error'])) { ?>
            <div class="flex -m-4 items-center justify-center mb-4">
                <div class="p-4 w-full sm:w-1/3">
                    <div class="h-full shadow-xl rounded-lg overflow-hidden">
                        <img src="<?= getUploadedImg("profile/" . $model['admin']->profile_pic) ?>" alt="" class="w-full h-40 object-cover object-center">
                        <div class="py-4 px-6">
                            <h1 class="font-semibold text-2xl text-center"><?= $model['admin']->username ?></h1>
                        </div>
                        <div class="py-4 px-6 space-y-2">
                            <div class="border-2 border-abu py-4 px-6 rounded-lg bg-dark-white">
                                <p class="font-rubik font-medium text-xl text-abu">Nama : <?= $model['admin']->name ?></p>
                                <p class="font-rubik font-medium text-xl text-abu">Email : <?= $model['admin']->email ?></p>
                                <p class="font-rubik font-medium text-xl text-abu">Nomor hp : <?= $model['admin']->phone ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <div class="w-3/4 lg:w-2/4">
                    <h1 class="font-rubik font-medium text-xl text-center mb-4 mt-4">Daftar admin</h1>
                </div>
            </div>
            <div class="flex flex-wrap -m-4 items-center justify-center">
                <?php foreach ($model['displayAdmin'] as $row) { ?>
                    <?php if ($row['role'] == "Admin") { ?>
                        <?php if ($row['email'] != $model['admin']->email) { ?>
                            <!-- card -->
                            <div class="p-4 w-full sm:w-1/3">
                                <div class="relative h-full shadow-xl rounded-lg overflow-hidden hover:bg-merah hover:text-white">
                                    <img src="<?= getUploadedImg("profile/" . $row['profile_pic']) ?>" alt="" class="w-full h-40 object-cover object-center">
                                    <div class="py-4 px-6">
                                        <h1 class="font-semibold text-2xl text-center"><?= $row['username'] ?></h1>
                                    </div>
                                    <div class="py-4 px-6 space-y-2">
                                        <div class="border-2 border-abu py-4 px-6 rounded-lg bg-dark-white">
                                            <p class="font-rubik font-medium text-xl text-abu">Nama : <?= $row['name'] ?></p>
                                            <p class="font-rubik font-medium text-xl text-abu">Email : <?= $row['email'] ?></p>
                                            <p class="font-rubik font-medium text-xl text-abu">Nomor hp : <?= $row['phone'] ?></p>
                                        </div>
                                    </div>
                                    <a onclick="return confirm('Anda yakin ingin menghapus admin (<?= $row['username'] ?>)')" href="/admin/delete/<?= $row['id'] ?>">
                                        <div class="absolute top-0 right-0 mt-2 mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-8 h-8 text-merah">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.28 7.22a.75.75 0 00-1.06 1.06L8.94 10l-1.72 1.72a.75.75 0 101.06 1.06L10 11.06l1.72 1.72a.75.75 0 101.06-1.06L11.06 10l1.72-1.72a.75.75 0 00-1.06-1.06L10 8.94 8.28 7.22z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="flex col-span-12 items-center justify-center">
                <div class="w-3/4 lg:w-2/4">
                    <h1 class="text-3xl text-center mb-4"><?= $model['error'] ?></h1>
                </div>
            </div>
        <?php } ?>
    </div>
</section>