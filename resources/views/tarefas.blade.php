<div x-data="{ add_modal: false}">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
            <div class="p-6 bg-white border-b border-gray-200">
               <!-- Listando -->
               <div class="grid grid-cols-4">
                <div class="p-3 m-0.5 border rounded-lg bg-green-100 hover:bg-green-200 cursor-pointer" @click= "add_modal = true">
                    Adicionar tarefa
                </div>  

                @foreach (Auth::user()->tarefas->sortBy('finalizacao') as $tarefa)
                <div class="p-3 m-0.5 border rounded-lg ">

                    <b>{{ $tarefa->titulo }}</b> <br>
                    Prazo: {{ $tarefa->finalizacao}}
                    <br><br>
                    Descrição: <i> {{ $tarefa->descricao}} </i>

                    <div class="px-4 py-3 sm:w-auto sm:flex sm:justify-center">
                        <a class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            {{ __('Editar')}}
                        </a>

                        <a class= "w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-500 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" href="{{ route('rm-tarefa', $tarefa)}}">
                            {{ __('Excluir')}}
                        </a>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="fixed z-10 inset-0 overflow-y-auto" x-show="add_modal">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!--
              Background overlay, show/hide based on modal state.       

              Entering: "ease-out duration-300"
                From: "opacity-0"
                To: "opacity-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100"
                To: "opacity-0"
            -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true" @click="add_modal = false">
              <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
          </div>      

          <!-- This element is to trick the browser into centering the modal contents. -->
          <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <!--
              Modal panel, show/hide based on modal state.      

              Entering: "ease-out duration-300"
                From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                To: "opacity-100 translate-y-0 sm:scale-100"
              Leaving: "ease-in duration-200"
                From: "opacity-100 translate-y-0 sm:scale-100"
                To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
            -->
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
              <div class="p-3">
                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-headline">
                    Adicionar tarefa
                </h3>

                <div class="mt-2">
                    <form action="{{ route('add-tarefa', $tarefa) }}" method="POST">
                        @csrf
                        <div>
                            <x-label for="finalizacao" :value="__('Prazo')" />          

                            <x-input id="finalizacao" class="block mt-1 w-full" type="date" name="finalizacao" :value="old('finalizacao')" required autofocus />
                        </div>  

                        <div>
                            <x-label for="titulo" :value="__('Título')" />          

                            <x-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" required autofocus />
                        </div>  

                        <div>
                            <x-label for="descricao" :value="__('Descrição')" />       

                            <x-input id="descricao" class="block mt-1 w-full" type="text" name="descricao" :value="old('descricao')" required autofocus />
                        </div>

                        <div class="px-4 py-3 sm:w-auto sm:flex sm:flex-row-reverse">
                            <x-button class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-500 text-base font-medium text-white hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                                {{ __('Adicionar')}}
                            </x-button>

                            <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="add_modal = false">
                                {{ __('Cancelar')}}
                            </button>
                        </div>
                    </form>

                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>