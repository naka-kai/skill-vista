@extends('Layouts.app')

@section('content')

    <div class="my-10">
        {{-- フラッシュメッセージ・エラー表示 --}}
        <div class="text-left mx-auto flex flex-col text-red-400">
            @if (session('flash_message'))
                <div class="my-3">
                    {{ session('flash_message') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="my-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="my-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <div class="max-w-4xl p-6 mx-auto bg-white rounded-md shadow-md dark:bg-gray-800 flex flex-col items-center">
            <h2 class="text-lg font-semibold text-gray-700 capitalize dark:text-white mb-5">アカウント情報</h2>

            <div class="flex flex-col">
                {{-- アイコン画像 --}}
                <div class="wrapper flex flex-col items-center justify-center">
                    <figure class="w-full flex justify-center">
                        <img class="object-cover w-36 h-36 rounded-full"
                            src="{{ $teacher->image == null || '' ? asset('img/kkrn_icon_user_13.png') : asset($teacher->image) }}"
                            alt="">
                    </figure>
                    <div class="flex items-center mt-2 mb-5">
                        <p>アイコン画像</p>
                        <button
                            class="modalOpen inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                            type="button">編集</button>
                    </div>
                    <div class="modal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                        <div
                            class="bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                            <div class="flex items-center justify-between mb-5">
                                <h1 class="font-bold text-lg">アイコン画像を変更</h1>
                                <span class="modalClose cursor-pointer">×</span>
                            </div>
                            <div>
                                <form
                                    action="{{ route('teacher.profile.update', ['teacherName' => $teacher->last_name_en . $teacher->first_name_en]) }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $teacher->id }}">
                                    <div>
                                        <div class="flex items-end mb-4 mt-3">
                                            <img id="displayImg"
                                                src="{{ $teacher->image == null || '' ? asset('img/kkrn_icon_user_13.png') : asset($teacher->image) }}"
                                                alt="" class="w-24 h-24 rounded-full">
                                            <button
                                                class="py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                                                type="button" id="displayImgDelete">削除</button>
                                        </div>
                                        <label for="image"
                                            class="flex items-center px-3 py-3 text-center bg-white border-2 border-dashed rounded-lg cursor-pointer dark:border-gray-600 dark:bg-gray-900">
                                            <h2 id="fileName" class="mx-3 text-gray-400">画像を選択してください</h2>
                                            <input id="image" type="file" name="image"
                                                class="hidden @error('image') is-invalid @enderror"
                                                accept=".jpg, .jpeg, .png, .gif" value="{{ old('image') }}"
                                                autocomplete="image" />
                                        </label>
                                    </div>
                                    <button type="submit"
                                        class="bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md w-full mt-5">変更</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- 氏名 --}}
                <div>
                    <div class="flex items-center mt-7">
                        <p class="text-gray-700 dark:text-gray-200">氏名</p>
                    </div>
                    <p class="ml-3 mt-2">{{ $teacher->last_name }} {{ $teacher->first_name }}</p>
                </div>

                {{-- メールアドレス --}}
                <div class="wrapper">
                    <div class="flex items-center mt-6">
                        <p class="text-gray-700 dark:text-gray-200">メールアドレス *</p>
                        <button
                            class="modalOpen inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                            type="button">編集</button>
                    </div>
                    <p class="ml-3 mt-2">{{ $teacher->email }}</p>
                    <div class="modal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                        <div
                            class="bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                            <div class="flex items-center justify-between mb-5">
                                <h1 class="font-bold text-lg">メールアドレスを変更</h1>
                                <span class="modalClose cursor-pointer">×</span>
                            </div>
                            <div>
                                <form action="{{ route('teacher.email.sendChangeEmailLink') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $teacher->id }}">
                                    <div class="flex flex-col">
                                        <label for="email" class="mb-2">新しいメールアドレス</label>
                                        <input type="text" name="email" id="email"
                                            class="mb-4 border border-gray-700 rounded-sm p-1">
                                        <button type="submit"
                                            class="bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md">確認メールを送信</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- プロフィール --}}
                <div>
                    <form
                        action="{{ route('teacher.profile.update', ['teacherName' => $teacher->last_name_en . $teacher->first_name_en]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                        <div class="flex items-center mt-7">
                            <p class="text-gray-700 dark:text-gray-200">プロフィール *</p>
                            <button
                                class="editBtn inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                                type="button">編集</button>
                            <button
                                class="submitBtn items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-500 rounded-sm hover:opacity-70 ml-5 hidden"
                                type="submit">保存</button>
                        </div>
                        <textarea name="profile" class="editContent ml-3 mt-2 resize-none outline-none" readonly>{!! nl2br(e($teacher->profile)) !!}</textarea>
                    </form>
                </div>

                {{-- Webサイト --}}
                <div>
                    <form
                        action="{{ route('teacher.profile.update', ['teacherName' => $teacher->last_name_en . $teacher->first_name_en]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                        <div class="flex items-center mt-7">
                            <p class="text-gray-700 dark:text-gray-200">Webサイト</p>
                            <button
                                class="editBtn inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                                type="button">編集</button>
                            <button
                                class="submitBtn items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-500 rounded-sm hover:opacity-70 ml-5 hidden"
                                type="submit">保存</button>
                        </div>
                        <input name="hp" value="{{ $teacher->hp }}"
                            class="editContent ml-3 mt-2 resize-none outline-none" readonly />
                    </form>
                </div>

                {{-- Xアカウント --}}
                <div>
                    <form
                        action="{{ route('teacher.profile.update', ['teacherName' => $teacher->last_name_en . $teacher->first_name_en]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                        <div class="flex items-center mt-7">
                            <p class="text-gray-700 dark:text-gray-200">Xアカウント</p>
                            <button
                                class="editBtn inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                                type="button">編集</button>
                            <button
                                class="submitBtn items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-500 rounded-sm hover:opacity-70 ml-5 hidden"
                                type="submit">保存</button>
                        </div>
                        <input name="x" value="{{ $teacher->x }}"
                            class="editContent ml-3 mt-2 resize-none outline-none" readonly />
                    </form>
                </div>

                {{-- Youtubeアカウント --}}
                <div>
                    <form
                        action="{{ route('teacher.profile.update', ['teacherName' => $teacher->last_name_en . $teacher->first_name_en]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{ $teacher->id }}">
                        <div class="flex items-center mt-7">
                            <p class="text-gray-700 dark:text-gray-200">Youtubeアカウント</p>
                            <button
                                class="editBtn inline-flex items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 ml-5"
                                type="button">編集</button>
                            <button
                                class="submitBtn items-center py-1 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border border-gray-500 rounded-sm hover:opacity-70 ml-5 hidden"
                                type="submit">保存</button>
                        </div>
                        <input name="youtube" value="{{ $teacher->youtube }}"
                            class="editContent ml-3 mt-2 resize-none outline-none" readonly />
                    </form>
                </div>

                {{-- パスワード --}}
                <div class="wrapper flex justify-start mt-9">
                    <button
                        class="modalOpen px-8 py-2.5 leading-5 text-gray-700 transition-colors duration-300 transform bg-gray-100 border border-gray-500 rounded-md hover:opacity-70">パスワードを変更</button>
                    <div class="modal hidden fixed z-50 left-0 top-0 h-full w-full bg-[rgba(0,0,0,0.5)]">
                        <div
                            class="bg-white mx-auto my-[50%] w-1/2 lg:w-1/3 duration-300 transform ease-in-out p-6 rounded-sm">
                            <div class="flex items-center justify-between mb-5">
                                <h1 class="font-bold text-lg">パスワードを変更</h1>
                                <span class="modalClose cursor-pointer">×</span>
                            </div>
                            <div>
                                <form
                                    action="{{ route('teacher.profile.update', ['teacherName' => $teacher->last_name_en . $teacher->first_name_en]) }}"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="id" value="{{ $teacher->id }}">
                                    <div class="flex flex-col">
                                        <div class="w-full">
                                            <label for="oldPassword" class="mb-2">現在のパスワード</label>
                                            <input type="password" name="oldPassword" id="oldPassword"
                                                class="mb-4 border border-gray-700 rounded-sm p-1 w-full">
                                        </div>
                                        <div class="w-full">
                                            <label for="newPassword" class="mb-2">新しいパスワード</label>
                                            <input type="password" name="newPassword" id="newPassword"
                                                class="mb-4 border border-gray-700 rounded-sm p-1 w-full">
                                        </div>
                                        <div class="w-full">
                                            <label for="newPassword_confirmation" class="mb-2">新しいパスワード再入力</label>
                                            <input type="password" name="newPassword_confirmation"
                                                id="newPassword_confirmation"
                                                class="mb-6 border border-gray-700 rounded-sm p-1 w-full">
                                        </div>
                                        <button type="submit"
                                            class="bg-gray-700 text-white hover:opacity-70 py-2 px-5 rounded-md">パスワードを変更</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="mt-10 py-2 px-3 text-sm font-medium text-center text-gray-500 bg-gray-100 border rounded-sm hover:opacity-70 w-48">
                    <a href="{{ route('teacher.logout') }}" class="block"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        {{ __('ログアウト') }}
                    </a>

                    <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            /* モーダル開閉 */
            $('.modalOpen').on('click', function() {
                $(this).next('.modal').removeClass('hidden').addClass('flex justify-center items-center');
                $(this).parent().nextAll('.modal').removeClass('hidden').addClass('flex justify-center items-center');
            })
            $('.modalClose').on('click', function() {
                $(this).closest('.wrapper').find('.modal').removeClass('flex justify-center items-center').addClass(
                    'hidden');
            })

            /* アイコン画像を選択時にプレビュー表示 */
            // プレビュー表示
            $('#image').on('change', function(e) {
                $('#fileName').text($('#image').prop('files')[0].name);
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#displayImg').attr('src', e.target.result);
                    $(this).closest('form').remove('<input type="hidden" name="delete" id="delete" value="true" />')
                }
                reader.readAsDataURL(e.target.files[0]);
            })
            // プレビューを削除してデフォルトに戻す
            $('#displayImgDelete').on('click', function(e) {
                $('#displayImg').attr('src', "{{ asset('img/kkrn_icon_user_13.png') }}");
                $('#image').val('');
                $('#fileName').text('画像を選択してください');
                $(this).closest('form').append('<input type="hidden" name="delete" id="delete" value="true" />')
            })

            /* その場編集 */
            // 編集・保存ボタンの切り替え
            $('.editBtn').on('click', function() {
                $(this).next('.submitBtn').removeClass('hidden').addClass('inline-flex');
                $(this).addClass('hidden').removeClass('inline-flex');
                // テキストエリア編集可能
                $(this).parent().next('.editContent').attr('readonly', false);
                $(this).parent().next('.editContent').removeClass('resize-none outline-none').addClass('border p-1');
            })
            $('.submitBtn').on('click', function() {
                $(this).prev('.editBtn').removeClass('hidden').addClass('inline-flex');
                $(this).removeClass('inline-flex').addClass('hidden');
                // テキストエリア編集不可
                $(this).parent().next('.editContent').attr('readonly', true);
                $(this).parent().next('.editContent').removeClass('border p-1').addClass('resize-none outline-none');
            })
        </script>
    @endsection
