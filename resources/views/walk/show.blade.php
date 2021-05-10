@extends('layouts.app')

@section('content')
    @if(session()->has('message'))
        <div class="flex items-center bg-blue-500 text-white text-sm font-bold " role="alert">
            <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
            <p class="pt-3">{{session('message')}}</p>
        </div>
    @endif

    {{--    Tutaj trzeba zrobic ladna strone z informacjami o userze itd - coś a'la na przykład wygląd aukcji na olx.--}}
    {{--    Władujcie tutaj jakieś domyślne zdjęcie jak wcześniej, w widoku są wyrzucone modele: User, Walk, Pet. Nic nie trzeba szukać, jedynie wypisywać gotowe informacje i ostylować --}}
    <br> <br>
    <span
        class="text-center text-l md:text-xl border-green-500 border-4 rounded-full px-3 py-2 text-s font-bold cursor-pointer tracking-wider uppercase hover:bg-gray-100">
                                    <a class="text-green-400 hover:no-underline hover:text-green-400" id="open-btn"> Umów się </a>
    </span>
{{--MODAL--}}
    <div class="bg-black bg-opacity-50 absolute inset-0 hidden justify-center items-center" id="overlay">
        <div class="bg-gray-200 max-w-sm py-2 px-3 rounded shadow-xl text-gray-800">
            <div class="flex justify-between items-center">
                <h4 class="text-lg font-bold">Spacer z {{$walk->pet->name}}</h4>
                <svg class="h-6 w-6 cursor-pointer p-1 hover:bg-gray-300 rounded-full" id="close-modal"
                     fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                          d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd"></path>
                </svg>
            </div>
            <div class="mt-2 text-sm">
                <p>Spacer z psem {{$walk->pet->name}} rasy {{$walk->pet->breed}}<br>
                Planowana data spaceru {!! date('d.m.Y', strtotime($walk->date)) !!} <br>
                O godzinie:  {!! date('H:i', strtotime($walk->date)) !!}
                </p>
            </div>
            <div class="mt-3 flex justify-end space-x-3">
                <a href="{{route('bookWalk', $walk->id)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block mx-auto">Potwierdź wyjście</a>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            const overlay = document.querySelector('#overlay')
            const openBtn = document.querySelector('#open-btn')
            const closeBtn = document.querySelector('#close-modal')

            const toggleModal = () => {
                overlay.classList.toggle('hidden')
                overlay.classList.toggle('flex')
            }

            openBtn.addEventListener('click', toggleModal)

            closeBtn.addEventListener('click', toggleModal)
        })

    </script>
    </body>
@endsection
