<div id="layoutAuthentication" class="min-h-screen bg-slate-50">
    <div id="layoutAuthentication_content">
        <main>
            <div class="min-h-screen flex items-center justify-center px-4 py-8">

                <div class="w-full max-w-md">

                    <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">

                        <!-- Header -->
                        <div class="bg-gradient-to-r from-indigo-600 to-violet-600 text-white text-center px-6 py-8">
                            <h3 class="text-2xl font-bold mb-1">
                                Login Akun
                            </h3>

                            <p class="text-sm text-indigo-100">
                                Sistem Pendukung Keputusan Rekomendasi Laptop
                            </p>
                        </div>

                        <!-- Flash Message -->
                        <?php if ($this->session->flashdata('pesan')) : ?>
                            <div class="px-6 pt-5">
                                <div class="flex items-center gap-3 rounded-xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">
                                    <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>

                                    <div>
                                        <?= $this->session->flashdata('pesan') ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Body -->
                        <div class="px-6 py-6">

                            <form action="<?= base_url('auth') ?>" method="post">

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

                                <!-- Password -->
                                <div class="mb-6">
                                    <label for="password"
                                        class="block text-sm font-semibold text-slate-700 mb-2">
                                        Password
                                    </label>

                                    <input
                                        class="w-full px-4 py-3 rounded-xl border border-slate-300
                                               text-slate-700 placeholder-slate-400
                                               focus:outline-none focus:ring-2 focus:ring-indigo-500
                                               focus:border-indigo-500 transition"
                                        id="password"
                                        type="password"
                                        placeholder="Masukkan Password"
                                        name="password" />

                                    <?= form_error(
                                        'password',
                                        '<small class="block text-red-500 mt-1">',
                                        '</small>'
                                    ) ?>
                                </div>

                                <!-- Button -->
                                <button
                                    class="w-full py-3 px-4 rounded-xl
                                           bg-indigo-600 hover:bg-indigo-700
                                           text-white font-semibold
                                           shadow-sm hover:shadow-md
                                           transition duration-200"
                                    type="submit">
                                    Login
                                </button>

                            </form>
                        </div>

                        <!-- Footer -->
                        <div class="bg-slate-50 border-t border-slate-100 text-center px-6 py-5">
                            <span class="text-slate-500 text-sm">
                                Belum punya akun?
                            </span>

                            <a href="<?= base_url('auth/daftar') ?>"
                                class="text-indigo-600 hover:text-indigo-700
                                       font-semibold text-sm ml-1 transition">
                                Daftar di sini
                            </a>
                        </div>

                    </div>

                </div>

            </div>
        </main>
    </div>
</div>