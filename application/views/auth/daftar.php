<div id="layoutAuthentication" class="min-h-screen bg-slate-50">
    <div id="layoutAuthentication_content">
        <main>
            <div class="min-h-screen flex items-center justify-center px-4 py-8">

                <div class="w-full max-w-2xl">

                    <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">

                        <!-- Header -->
                        <div class="bg-gradient-to-r from-indigo-600 to-violet-600 text-white text-center px-6 py-8">
                            <h3 class="text-2xl font-bold mb-1">
                                Daftar Akun
                            </h3>

                            <p class="text-sm text-indigo-100">
                                Buat akun untuk menggunakan sistem rekomendasi laptop
                            </p>
                        </div>

                        <!-- Body -->
                        <div class="px-6 py-7 sm:px-8">

                            <form action="<?= base_url('auth/daftar') ?>" method="post">

                                <!-- Username -->
                                <div class="mb-5">
                                    <label for="username"
                                        class="block text-sm font-semibold text-slate-700 mb-2">
                                        Username
                                    </label>

                                    <input
                                        class="w-full px-4 py-3 rounded-xl border border-slate-300
                                               text-slate-700 placeholder-slate-400
                                               focus:outline-none focus:ring-2 focus:ring-indigo-500
                                               focus:border-indigo-500 transition"
                                        id="username"
                                        type="text"
                                        placeholder="Masukkan Username"
                                        name="username"
                                        value="<?= set_value('username') ?>" />

                                    <?= form_error(
                                        'username',
                                        '<small class="block text-red-500 mt-1">',
                                        '</small>'
                                    ) ?>
                                </div>

                                <!-- Nama Lengkap -->
                                <div class="mb-5">
                                    <label for="nama_lengkap"
                                        class="block text-sm font-semibold text-slate-700 mb-2">
                                        Nama Lengkap
                                    </label>

                                    <input
                                        class="w-full px-4 py-3 rounded-xl border border-slate-300
                                               text-slate-700 placeholder-slate-400
                                               focus:outline-none focus:ring-2 focus:ring-indigo-500
                                               focus:border-indigo-500 transition"
                                        id="nama_lengkap"
                                        type="text"
                                        placeholder="Masukkan Nama Lengkap"
                                        name="nama_lengkap"
                                        value="<?= set_value('nama_lengkap') ?>" />

                                    <?= form_error(
                                        'nama_lengkap',
                                        '<small class="block text-red-500 mt-1">',
                                        '</small>'
                                    ) ?>
                                </div>

                                <!-- Password -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mb-5">

                                    <!-- Password -->
                                    <div>
                                        <label for="password1"
                                            class="block text-sm font-semibold text-slate-700 mb-2">
                                            Password
                                        </label>

                                        <input
                                            class="w-full px-4 py-3 rounded-xl border border-slate-300
                                                   text-slate-700 placeholder-slate-400
                                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                                   focus:border-indigo-500 transition"
                                            id="password1"
                                            type="password"
                                            placeholder="Masukkan Password"
                                            name="password1" />

                                        <?= form_error(
                                            'password1',
                                            '<small class="block text-red-500 mt-1">',
                                            '</small>'
                                        ) ?>
                                    </div>

                                    <!-- Konfirmasi Password -->
                                    <div>
                                        <label for="password2"
                                            class="block text-sm font-semibold text-slate-700 mb-2">
                                            Konfirmasi Password
                                        </label>

                                        <input
                                            class="w-full px-4 py-3 rounded-xl border border-slate-300
                                                   text-slate-700 placeholder-slate-400
                                                   focus:outline-none focus:ring-2 focus:ring-indigo-500
                                                   focus:border-indigo-500 transition"
                                            id="password2"
                                            type="password"
                                            placeholder="Konfirmasi Password"
                                            name="password2" />
                                    </div>

                                </div>

                                <!-- Info -->
                                <div class="flex items-start gap-2 mb-6 text-sm text-slate-500">
                                    <svg class="w-5 h-5 text-indigo-500 shrink-0 mt-0.5"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" />
                                    </svg>

                                    <span>
                                        Pastikan password dan konfirmasi password sesuai.
                                    </span>
                                </div>

                                <!-- Button -->
                                <button
                                    class="w-full py-3 px-4 rounded-xl
                                           bg-indigo-600 hover:bg-indigo-700
                                           text-white font-semibold
                                           shadow-sm hover:shadow-md
                                           transition duration-200"
                                    type="submit">
                                    Daftar Akun
                                </button>

                            </form>

                        </div>

                        <!-- Footer -->
                        <div class="bg-slate-50 border-t border-slate-100 text-center px-6 py-5">
                            <span class="text-slate-500 text-sm">
                                Sudah punya akun?
                            </span>

                            <a href="<?= base_url('auth') ?>"
                                class="text-indigo-600 hover:text-indigo-700
                                       font-semibold text-sm ml-1 transition">
                                Login di sini
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </main>
    </div>
</div>