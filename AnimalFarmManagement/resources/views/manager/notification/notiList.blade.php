<!DOCTYPE html>
<html>
<head>
<style>
    .right {
        float: right;
}

.center {
    text-align:center;
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
  grid-template-columns: auto auto auto auto auto;
  padding: 10px;
}
.grid-item {
  padding: 5px;
  text-align: left;
}


}
</style>
</head>
</html>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Worktable') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-3">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="w3-display-right">
                    <a class="yelow" href="{{ route('manager.worktable.createWork') }}" title="Create Work">Create Table</a>
                </div>
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <div class="table-responsive">
                                    <div class="grid-container">
                                        <div class="grid-item">
                                            Staff:
                                            <select name="staff" id="staff" required>
                                                <option> --Select staff--</option>
                                                <option value="Zahid">Zahid</option>
                                                <option value="Hafizhi">Hafizhi</option>
                                                <option value="Asyraf">Asyraf</option>
                                                <option value="Rahim">Rahim</option>
                                            </select>
                                        </div>
                                        <div class="grid-item">
                                            Date From: <input type="date" name="date" id="date" required><br>Until: <input type="date" name="date" id="date"><br>
                                        </div>
                                        <div class="grid-item">
                                        </div>
                                        <div class="grid-item">
                                        </div>
                                        <div class="grid-item">
                                            <a class="greeny" href=""
                                            class="btn btn-success" title="Download as excel">Export to Excel</a><br><br>
                                            <a class="blue" href="" class="btn btn-success">Filter Search</a>
                                        </div>
                                    </div>
                                    <table id="editable" class="table table-bordered table-striped">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Check
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    ID
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Date
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Staff
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Animals need to check
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Details
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Created Date
                                                </th>
                                                <th scope="col"
                                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Created By
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            902
                                                        </div>
                                                    </div>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div>
                                                        2021-04-30 to 2021-05-02
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    Asyraf
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    A2 A5 A7
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    Give Milk Colostrum 1 Capsule everyday
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    2021-03-30
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    Abu Farmer
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                            <tr>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <input type="checkbox">
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            901
                                                        </div>
                                                    </div>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div>
                                                        2021-04-30
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    Zahid
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    A1 A3 A6
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    Check health condition and weight
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    2021-03-27
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    Abu Farmer
                                                </td>
                                            </tr>
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
</x-app-layout>
