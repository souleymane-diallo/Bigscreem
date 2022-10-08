<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('url'))
                        <div class="alert alert-success alert-dismissible fade show" id="notif-bar" style="margin-top:8px"
                            role="alert">
                            <p>"Toute l’équipe de Bigscreen vous remercie pour votre engagement. Grâce à
                                votre investissement, nous vous préparons une application toujours plus
                                facile à utiliser, seul ou en famille.
                                Si vous désirez consulter vos réponse ultérieurement, vous pouvez consultez
                                cette adresse : <a href='answer/{{ session('url') }}' />{{ session('url') }}</a></p>
                            <button type="button" id="close_notif" class="close" data-dismiss="alert"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
