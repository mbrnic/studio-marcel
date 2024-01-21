@extends('layouts.admin.index')

@section('content')

        <div class="box">
            <div class="box-header bg-transparent">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i></span>
                </div>
                <h3 class="box-title"><i class="icon-view-list"></i>
                    <span>Ostalo</span>
                </h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body " style="display: block;">
                <table id="responsive-example-table" class="table large-only">
                    <tbody>
                        <tr class="text-right">
                            <th colspan="2" style="text-align: center">Kategorija</th>
                            <th colspan="2" style="text-align: center">Vrijednost</th>
                            <th style="text-align: center;">Dodatno</th>
                        </tr>

                        @foreach ( $others as $other )

                            <tr>
                                <td colspan="2" style="text-align: center;">{{ $other->category }}</td>
                                <td colspan="2" style="text-align: center;">{{ $other->value }}</td>
                                <td style="text-align: center;">
                                    <button id="buttonRevealModalEdit{{$other->id}}" data-reveal-id="modalEdit{{$other->id}}" class="button radius small success round">
                                        <span class="icon-document-edit"></span> Uredi
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modalEdit{{$other->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                        <h2>Uredi</h2>
                                        <div class="large-12 columns">

                                        <form action="{{ route('admin.other.update', [$other->id]) }}" method="POST" id="formEdit{{$other->id}}" name="formEdit{{$other->id}}">
                                            @method('PUT')
                                            @csrf
                                                    
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="text_value">{{ $other->category }}</label>
                                                    <input type="text" placeholder="" id="text_value" name="text_value" value="{{ $other->value }}">
                                                </div>
                                            </div>
                                            <button class="button radius small success round" type="submit" name="edit" value="{{$other->id}}">
                                                <span class="icon-document-edit"></span> Spremi promjenu
                                            </button>

                                        </form>

                                        </div>
                                        <a class="close-reveal-modal">×</a>
                                    </div>
                                    <!-- Reveal Modals end -->
                                </td>
                            </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        <!-- box -->
    </div>
</div>


@endsection