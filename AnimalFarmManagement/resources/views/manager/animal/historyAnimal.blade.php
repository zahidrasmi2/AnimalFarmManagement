<!DOCTYPE html>
<html>

<head>
    <style>
        .right {
            float: right;
        }

        .center {
            text-align: center;
        }

        .left {
            text-align: left;
        }

        .greeny {
            background-color: green;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .blue {
            background-color: rgb(17, 175, 248);
            color: rgb(0, 0, 0);
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .redy {
            background-color: rgb(248, 17, 17);
            color: rgb(255, 255, 255);
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .yelow {
            background-color: rgb(239, 255, 21);
            color: rgb(0, 0, 0);
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .clearfix {
            overflow: auto;
        }

        .grid-container {
            display: grid;
            grid-template-columns: auto auto auto auto;
            padding: 10px;
        }

        .grid-item {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>

</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Animal') }}
        </h2>
    </x-slot>

    <body>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-1">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <div class="table-responsive">
                                        @csrf
                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <div class="visible-print text-center">
                                                    <h1>QR CODE</h1>
                                                    <img src={!! QrCode::size(100)->generate(route('manager.animal.updateAnimal',[$id])) !!}
                                                </div>
                                            </div>
                                            <div class="grid-item">
                                            </div>

                                            <div class="grid-item">
                                            </div>

                                            <div class="grid-item">
                                                <a class="greeny" href="{{ route('manager.animal.downloadExcel') }}" class="btn btn-success">Export to Excel</a><br><br>
                                                <a class="blue" href="{{ route('manager.animal.updateAnimal',[$id]) }} " class="btn btn-success">Update</a>
                                            </div>
                                        </div>

                                        <div class="grid-container">
                                            <div class="grid-item">
                                                <table>
                                                    <thead>
                                                        @foreach($animal as $ani)
                                                        <tr>
                                                            <th>ANIMAL ID</th>
                                                            <th>: {{$ani -> id}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>TAG NUMBER</th>
                                                            <th>: {{$ani -> tagNumber}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>BREED</th>
                                                            <th>: {{$ani -> breed}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>BORN DATE</th>
                                                            <th>: {{$ani -> bornYear}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>WEIGHT(KG)</th>
                                                            <th>: {{$ani -> weight}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>HEALTH</th>
                                                            <th>: {{$ani -> health}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>COMMENT</th>
                                                            <th>: {{$ani -> comment}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>STATUS</th>
                                                            <th>: {{$ani -> status}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>CHECK BY</th>
                                                            <th>: {{$ani -> checkBy}}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>LAST CHECK</th>
                                                            <th>: {{$ani -> checkDate}}</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                                @endforeach
                                            </div>
                                            <div class="grid-item">

                                            </div>
                                            <div class="grid-item">

                                            </div>
                                            <div class="grid-item">

                                            </div>
                                        </div>
                                        <table id="editable" class="table table-bordered table-striped">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        ID
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Tag Number
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Breed
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Born Date
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Weight (KG)
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Health
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Comment
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Status
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Check By
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                        Last Check
                                                    </th>

                                                </tr>
                                            </thead>

                                            @foreach ($animalH as $aniH)
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="flex items-center">
                                                            <div class="text-sm font-medium text-gray-900">
                                                                {{ $aniH->animalID }}
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div>
                                                            {{ $aniH->tagNumber }}</a>
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $aniH->breed }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $aniH->bornYear }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $aniH->weight }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $aniH->health }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $aniH->comment }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                            {{ $aniH->status }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $aniH->userCheckBy ? $aniH->userCheckBy->name : '' }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $aniH->checkDate }}
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

</x-app-layout>