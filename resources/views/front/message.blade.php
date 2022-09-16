<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (session('message'))
                    <div class="alert alert-success alert-dismissible fade show" id="notif-bar" style="margin-top:8px"
                        role="alert">
                        {{ session('message') }}
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
