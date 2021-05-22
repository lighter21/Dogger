@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="text-center p-2 mb-2 text-6xl font-bold">Twoje zlecenia</div>
        <div class="flex flex-wrap" id="tabs-id">
            <div class="w-full">
                <ul class="flex mb-0 list-none flex-wrap pt-3 pb-4 flex-row">
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-white bg-yellow-600" onclick="changeAtiveTab(event,'tab-profile')">
                            <i class="fas fa-space-shuttle text-base mr-1"></i> Oczekujące
                        </a>
                    </li>
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-yellow-600 bg-white" onclick="changeAtiveTab(event,'tab-settings')">
                            <i class="fas fa-cog text-base mr-1"></i> Zatwierdzone
                        </a>
                    </li>
                    <li class="-mb-px mr-2 last:mr-0 flex-auto text-center">
                        <a class="text-xs font-bold uppercase px-5 py-3 shadow-lg rounded block leading-normal text-yellow-600 bg-white" onclick="changeAtiveTab(event,'tab-done')">
                            <i class="fas fa-briefcase text-base mr-1"></i> Wykonane
                        </a>
                    </li>
                </ul>
                <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded">
                    <div class="px-4 py-5 flex-auto">
                        <div class="tab-content tab-space">
                            <div class="block" id="tab-profile">
                                @isset($pendingAgreements)
                                    <table class="w-full">
                                        <tr>
                                            <th class="w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Imię zwierzaka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Data i godzina spaceru</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Właściciel zwierzaka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>E-mail właściciela</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Dodatkowe informacje</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Co zamierzasz zrobić?</span>
                                                </a>
                                            </th>
                                        </tr>
                                        @foreach($pendingAgreements as $agreement)
                                            <tr>
                                                <td class="w-1/6 text-center py-2 bg-red border border-gray-400">{{$agreement->pet->name}}</td>
                                                <td class="w-1/6 text-center py-2 bg-red border border-gray-400">{{$agreement->date}}</td>

                                                <td class="w-1/6 text-center py-2 bg-red border border-gray-400">{{$agreement->user->name}}</td>
                                                <td class="w-1/6 text-center py-2 bg-red border border-gray-400">{{$agreement->user->email}}</td>
                                                <td class="w-1/6 text-center py-2 bg-red border border-gray-400">{{$agreement->description}}</td>

                                                <td class="w-1/6 text-center py-2 col-span=2 border border-gray-400">
                                                    <a href="{{route('declineWalk', $agreement->id)}}" class="bg-red-400 hover:bg-red-700 text-white inlineblock rounded mx-2">Odrzuć</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endisset
                                @empty($pendingAgreements)
                                    <p class="text-center px-2 py-2"> Nie masz żadnych oczekujących zleceń</p>
                                @endempty
                            </div>
                            <div class="hidden" id="tab-settings">
                                @isset($acceptedAgreements)
                                    <table class="w-full">
                                        <tr>
                                            <th class="w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Imię zwierzaka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Data i godzina spaceru</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Właściciel zwierzaka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>E-mail właściciela</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Dodatkowe informacje</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/6 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Co zamierzasz zrobić?</span>
                                                </a>
                                            </th>
                                        </tr>
                                        @foreach($acceptedAgreements as $agreement)
                                            <tr>
                                                <td class="w-1/6 text-center py-2 bg-red border border-gray-400">{{$agreement->pet->name}}</td>
                                                <td class="w-1/6 text-center py-2 bg-red border border-gray-400">{{$agreement->date}}</td>

                                                <td class="w-1/6 text-center py-2 bg-red border border-gray-400">{{$agreement->user->name}}</td>
                                                <td class="w-1/6 text-center py-2 bg-red border border-gray-400">{{$agreement->user->email}}</td>
                                                <td class="w-1/6 text-center py-2 bg-red border border-gray-400">{{$agreement->description}}</td>

                                                <td class="w-1/6 text-center py-2 col-span=2 border border-gray-400">
                                                    <a href="{{route('declineWalk', $agreement->id)}}" class="bg-red-400 hover:bg-red-700 text-white inlineblock rounded mx-2">Odrzuć</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endisset
                                @empty($pendingAgreements)
                                    <p class="text-center px-2 py-2"> Nie masz żadnych zatwierdzonych zleceń</p>
                                @endempty
                            </div>
                            <div class="hidden" id="tab-done">
                                @isset($doneAgreements)
                                    <table class="w-full">
                                        <tr>
                                            <th class="w-1/5 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Imię zwierzaka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/5 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Data i godzina spaceru</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/5 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Właściciel zwierzaka</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/5 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>E-mail właściciela</span>
                                                </a>
                                            </th>
                                            <th class=" w-1/5 bg-gray-200 text-center border border-gray-400 font-bold px-2 py-2">
                                                <a>
                                                    <span>Dodatkowe informacje</span>
                                                </a>
                                            </th>
                                        </tr>
                                        @foreach($doneAgreements as $agreement)
                                            <tr>
                                                <td class="w-1/5 text-center py-2 bg-red border border-gray-400">{{$agreement->pet->name}}</td>
                                                <td class="w-1/5 text-center py-2 bg-red border border-gray-400">{{$agreement->date}}</td>

                                                <td class="w-1/5 text-center py-2 bg-red border border-gray-400">{{$agreement->user->name}}</td>
                                                <td class="w-1/5 text-center py-2 bg-red border border-gray-400">{{$agreement->user->email}}</td>
                                                <td class="w-1/5 text-center py-2 bg-red border border-gray-400">{{$agreement->description}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endisset
                                @empty($pendingAgreements)
                                    <p class="text-center px-2 py-2"> Nie masz żadnych zakończonych zleceń</p>
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
