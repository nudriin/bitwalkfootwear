<section x-data="{open : true}">
    <div class="container mx-auto px-4 py-4 lg:px-20 lg:py-10">
        <?php if (isset($model['error'])) { ?>
            <div class="w-full lg:w-9/12 mx-auto">
                <div x-show="open" class="flex flex-row bg-red-600 rounded-md opacity-50 py-3 px-5 items-center justify-between" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
                    <h1 class="text-white text-lg"><?= $model['error'] ?></h1>
                    <button @click="open = !open" class="border-2 border-inherit text-white py-2 px-4 rounded-full">X</button>
                </div>
            </div>
        <?php } ?>
        <div class="flex items-center justify-center">
            <div class="w-3/4 lg:w-2/4">
                <h1 class="font-rubik font-medium text-4xl text-center mb-4 mt-12">Profil</h1>
            </div>
        </div>
        <div class="p-4 w-full">
            <div class="h-full lg:w-9/12 mx-auto shadow-lg rounded-lg overflow-hidden">
                <div class="grid grid-cols-12 items-center justify-center p-4 gap-4">
                    <form action="/admin/profile" method="post" class="col-span-12 flex flex-col items-center justify-center gap-2 z-0" enctype="multipart/form-data">
                        <div class="relative inset-0 col-span-12 mx-auto text-center mb-5">
                            <!-- <div class="relative"> -->
                            <img src="<?= getUploadedImg("profile/" . $model['admin_profile']) ?? '' ?>" alt="" id="profile_image" class="object-cover object-center h-48 w-48 border-4 border-abu rounded-full">
                            <div id="upload" style="position: absolute; bottom: 0; right: 0; width: 32px; height: 32px; line-height: 33px; text-align: center; border-radius: 50%; overflow: hidden; cursor: pointer;">
                                <input type="file" name="picture" id="file_input" required style="position: absolute; transform: scale(2); opacity: 0;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                                    <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                                    <path fill-rule="evenodd" d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div id="cancel" style="position: absolute; bottom: 0; left: 0; width: 32px; height: 32px; line-height: 33px; text-align: center; border-radius: 50%; overflow: hidden; cursor: pointer; display: none;">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8">
                                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <p class="col-span-12 border-2 border-abu p-3 rounded-lg w-full overflow-hidden bg-dark-white"><?= $model['admin']->email ?? $model['admin_name'] ?></p>
                        <input class="border-2 border-abu p-3 rounded-lg w-full mb-4" type="text" value="<?= $model['admin']->name ?? $model['admin_name'] ?>" name="name" required>
                        <div>
                            <button type="submit" class="font-semibold text-dark-white text-center bg-merah hover:bg-biru transition duration-200 ease-in p-2 rounded-lg text-xl w-full">Simpan</button>
                        </div>
                    </form>
                    <script type="text/javascript">
                        document.getElementById("file_input").onchange = function() {
                            document.getElementById("profile_image").src = URL.createObjectURL(file_input.files[0]);
                            document.getElementById("cancel").style.display = "block";
                            document.getElementById("upload").style.display = "none";
                        }
                        var userImg = document.getElementById('profile_image').src;
                        document.getElementById("cancel").onclick = function() {
                            document.getElementById('profile_image').src = userImg;
                            document.getElementById("cancel").style.display = "none";
                            document.getElementById("upload").style.display = "block";
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</section>