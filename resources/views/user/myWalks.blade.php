@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center p-2 mb-2 text-6xl font-bold">Twoje spacery</div>
        <div class="flex flex-wrap" id="tabs-id">
            <div class="w-full">
                <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-yellow-600"
                           onclick="changeAtiveTab(event,'tab-profile')">
                            <i class="fas fa-space-shuttle text-base mr-1"></i> Oczekujące
                        </a>
                    </li>
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-yellow-600 bg-white"
                           onclick="changeAtiveTab(event,'tab-settings')">
                            <i class="fas fa-cog text-base mr-1"></i> Zatwierdzone
                        </a>
                    </li>
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-yellow-600 bg-white"
                           onclick="changeAtiveTab(event,'tab-options')">
                            <i class="fas fa-briefcase text-base mr-1"></i> Do zatwierdzenia
                        </a>
                    </li>
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-yellow-600 bg-white"
                           onclick="changeAtiveTab(event,'tab-done')">
                            <i class="fas fa-briefcase text-base mr-1"></i> Wykonane
                        </a>
                    </li>
                </ul>
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                    <div class="px-4 py-5 flex-auto">
                        <div class="tab-content tab-space">
                            <div class="block" id="tab-profile">
                                @isset($pendingWalks)
                                    <table class="w-full">
                                        <tr>
                                            <th class="w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Imię zwierzaka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Data i godzina spaceru</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Stawka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Dodatkowe informacje</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Co zamierzasz zrobić?</span>
                                                </a>
                                            </th>
                                        </tr>
                                        @foreach($pendingWalks as $walk)
                                            <tr>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->pet->name}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->date}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->payment}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{substr($walk->description,0, 30)}}...</td>

                                                <td class="w-1/7 text-center py-2 col-span=2 border border-gray-400">
                                                    <a href="{{route('editWalk', $walk->id)}}"
                                                       class="bg-blue-400 hover:bg-blue-700 px-3 text-white inlineblock rounded mx-2">Edytuj</a>
                                                    <form method="post" action="{{ route('destroyWalk', $walk->id) }}">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button type="submit" class="bg-red-400 hover:bg-red-700 px-3 text-white inlineblock rounded mx-2">Usuń</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endisset
                                @empty($pendingWalks)
                                    <p class="text-center px-2 py-2"> Nie masz żadnych oczekujących spacerów</p>
                                @endempty
                            </div>
                            <div class="hidden" id="tab-settings">
                                @isset($acceptedWalks)
                                    <table class="w-full">
                                        <tr>
                                            <th class="w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Imię zwierzaka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Data i godzina spaceru</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Osoba wyprowadzająca</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>E-mail osoby wyprowadzającej</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Stawka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Dodatkowe informacje</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Co zamierzasz zrobić?</span>
                                                </a>
                                            </th>
                                        </tr>
                                        @foreach($acceptedWalks as $walk)
                                            <tr>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->pet->name}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->walk->date}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->tenant->name}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->tenant->email}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->walk->payment}}
                                                    DGC
                                                </td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{substr($walk->walk->description, 0, 30)}}...</td>

                                                <td class="w-1/7 text-center py-2 col-span=2 border border-gray-400">
                                                    <a href="{{route('declineWalk', $walk->id)}}"
                                                       class="bg-red-400 hover:bg-red-700 text-white inlineblock rounded px-3 mx-2">Anuluj</a>
                                                    <a href="{{route('payWalk', [$walk->walk->id, $walk->tenant->email,$walk->walk->payment])}}"
                                                       class="bg-blue-400 hover:bg-blue-700 text-white block rounded px-3 mx-2">Zakończ i zapłać</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endisset
                                @empty($pendingWalks)
                                    <p class="text-center px-2 py-2"> Nie masz żadnych oczekujących spacerów</p>
                                @endempty
                            </div>
                            <div class="hidden" id="tab-options">
                                @isset($activeWalks)
                                    <table class="w-full">
                                        <tr>
                                            <th class="w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Imię zwierzaka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Data i godzina spaceru</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Osoba wyprowadzająca</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>E-mail osoby wyprowadzającej</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Stawka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Dodatkowe informacje</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Co zamierzasz zrobić?</span>
                                                </a>
                                            </th>
                                        </tr>
                                        @foreach($activeWalks as $walk)
                                            <tr>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->pet->name}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->walk->date}}</td>

                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->tenant->name}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400"> {{$walk->tenant->email}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->walk->payment}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{substr($walk->walk->description,0 ,30) }}...</td>

                                                <td class="w-1/7 text-center py-2 col-span=2 border border-gray-400">
                                                    <a href="{{route('acceptWalk', $walk->walk->id)}}"
                                                       class="bg-blue-400 hover:bg-blue-700 text-white px-2  inlineblock rounded mx-2">Akceptuj</a>
                                                    <a href="{{route('declineWalk', $walk->walk->id)}}"
                                                       class="bg-red-400 hover:bg-red-700 text-white  px-2 inlineblock rounded mx-2">Odrzuć</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endisset
                                @empty($pendingWalks)
                                    <p class="text-center px-2 py-2"> Nie masz żadnych oczekujących spacerów</p>
                                @endempty
                            </div>
                            <div class="hidden" id="tab-done">
                                @isset($doneWalks)
                                    <table class="w-full">
                                        <tr>
                                            <th class="w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Imię zwierzaka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Data i godzina spaceru</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Osoba wyprowadzająca</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>E-mail osoby wyprowadzającej</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Stawka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Dodatkowe informacje</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/7 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Co zamierzasz zrobić?</span>
                                                </a>
                                            </th>
                                        </tr>
                                        @foreach($doneWalks as $walk)
                                            <tr>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->pet->name}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->walk->date}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->tenant->name}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->tenant->email}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{$walk->walk->payment}}</td>
                                                <td class="w-1/7 text-center py-2 bg-red border border-gray-400">{{substr($walk->walk->description, 0, 30)}}...</td>

                                                <td class="w-1/7 text-center py-2 col-span=2 border border-gray-400">
                                                    <a href="{{route('payWalk', [$walk->walk->id, $walk->tenant->email,$walk->walk->payment])}}"
                                                       class="bg-blue-400 hover:bg-blue-700 text-white inlineblock rounded mx-2 px-3">Zapłać</a>
{{--                                                    <a href="{{route('declineWalk', $walk->id)}}"--}}
{{--                                                       class="bg-red-400 hover:bg-red-700 text-white inlineblock rounded mx-2">Odrzuć</a>--}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endisset
                                @empty($pendingWalks)
                                    <p class="text-center px-2 py-2"> Nie masz żadnych oczekujących spacerów</p>
                                @endempty
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function changeAtiveTab(event, tabID) {
                let element = event.target;
                while (element.nodeName !== "A") {
                    element = element.parentNode;
                }
                ulElement = element.parentNode.parentNode;
                aElements = ulElement.querySelectorAll("li > a");
                tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
                for (let i = 0; i < aElements.length; i++) {
                    aElements[i].classList.remove("text-white");
                    aElements[i].classList.remove("bg-yellow-600");
                    aElements[i].classList.add("text-yellow-600");
                    aElements[i].classList.add("bg-white");
                    tabContents[i].classList.add("hidden");
                    tabContents[i].classList.remove("block");
                }
                element.classList.remove("text-yellow-600");
                element.classList.remove("bg-white");
                element.classList.add("text-white");
                element.classList.add("bg-yellow-600");
                document.getElementById(tabID).classList.remove("hidden");
                document.getElementById(tabID).classList.add("block");
            }
        </script>
@endsection
