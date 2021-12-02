<!DOCTYPE html>


<style>
  .content {
    padding-top: 40px;
    padding-bottom: 40px;
  }

  .icon-stat {
    display: block;
    overflow: hidden;
    position: relative;
    padding: 15px;
    margin-bottom: 1em;
    background-color: #fff;
    border-radius: 4px;
    border: 1px solid #ddd;
  }

  .icon-stat-label {
    display: block;
    color: #999;
    font-size: 13px;
  }

  .icon-stat-value {
    display: block;
    font-size: 28px;
    font-weight: 600;
  }

  .icon-stat-visual {
    position: relative;
    top: 22px;
    display: inline-block;
    width: 32px;
    height: 32px;
    border-radius: 4px;
    text-align: center;
    font-size: 16px;
    line-height: 30px;
  }

  .bg-primary {
    color: #fff;
    background: #d74b4b;
  }

  .bg-secondary {
    color: #fff;
    background: #6685a4;
  }

  .icon-stat-footer {
    padding: 10px 0 0;
    margin-top: 10px;
    color: #aaa;
    font-size: 12px;
    border-top: 1px solid #eee;
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
</style>

<html lang="en">

<head>
  <title>AFMS Dashboard</title>
</head>

<body>
  <x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard') }}
      </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


          @csrf
          @method('PUT')

          <div class="col-md-3 col-sm-6">
            <div class="icon-stat">

              <div class="grid-container">

                <div class="grid-item">
                  <div class="col-xs-8 text-center">
                    <span class="icon-stat-label">Total Alive</span>
                    <span class="icon-stat-value">{{$totalAlive}}</span>
                  </div>
                  <div class="col-xs-4 text-center">
                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">Adequate</span>
                            <span class="icon-stat-value">{{$totalAdequate}}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">Sub-Optimal</span>
                            <span class="icon-stat-value">{{$totalSub}}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">Poor</span>
                            <span class="icon-stat-value">{{$totalPoor}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--Total Butchered-->
                <div class="grid-item">

                  <div class="col-xs-8 text-center">
                    <span class="icon-stat-label">Total Butchered</span>
                    <span class="icon-stat-value">{{$totalButchered}}</span>
                  </div>
                  <div class="col-xs-4 text-center">
                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">This Week</span>
                            <span class="icon-stat-value">{{$totalButcheredWeek}}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">This Month</span>
                            <span class="icon-stat-value">{{$totalButcheredMonth}}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">This Year</span>
                            <span class="icon-stat-value">{{$totalButcheredYear}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--Total Sold-->
                <div class="grid-item">
                  <div class="col-xs-8 text-center">
                    <span class="icon-stat-label">Total Sold</span>
                    <span class="icon-stat-value">{{$totalSold}}</span>
                  </div>
                  <div class="col-xs-4 text-center">
                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">This Week</span>
                            <span class="icon-stat-value">{{$totalSolddWeek}}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">This Month</span>
                            <span class="icon-stat-value">{{$totalSoldMonth}}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">This Year</span>
                            <span class="icon-stat-value">{{$totalSoldYear}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--Total Death-->
                <div class="grid-item">
                  <div class="col-xs-8 text-center">
                    <span class="icon-stat-label">Total Death</span>
                    <span class="icon-stat-value">{{$totalDeath}}</span>
                  </div>
                  <div class="col-xs-4 text-center">
                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">This Week</span>
                            <span class="icon-stat-value">{{$totalDeathWeek}}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">This Month</span>
                            <span class="icon-stat-value">{{$totalDeathMonth}}</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                      <div class="icon-stat">
                        <div class="row">
                          <div class="col-xs-8 text-center">
                            <span class="icon-stat-label">This Year</span>
                            <span class="icon-stat-value">{{$totalDeathYear}}</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          {{-- <x-jet-welcome /> --}}
        </div>
      </div>
    </div>
  </x-app-layout>