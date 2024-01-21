@extends('layouts.admin.index')

@section('content')

        <div class="box">
            <div class="box-header bg-transparent">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i></span>
                </div>
                <h3 class="box-title"><i class="icon-view-list"></i>
                    <span>Aka tekstovi</span>
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body " style="display: block;">
                <div style="text-align: center;">
                    <button id="buttonModalAddNew" data-reveal-id="modalAddNew" class="button radius small round">
                        <span class="icon-tag"></span> Dodaj novi tekst
                    </button>


                        <!-- Reveal Modals begin -->
                        <div id="modalAddNew" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                            <h2>Dodaj novi</h2>
                            <div class="large-12 columns">

                                <form action="{{ route('admin.aka.store') }}" method="POST" id="formAddNew" name="formAddNewName">
                                    @csrf
                                    <div class="row">
                                        <div class="large-12 columns">
                                            <label for="name">Aka tekst</label>
                                            <input type="text" placeholder="" id="name" name="name" value="{{ old('name') }}">
                                            
                                            @error('name')
                                                <small class="error">{{ $message }}</small>
                                            @enderror

                                        </div>
                                    </div>
                                    <button class="button radius small round" type="submit" name="addNew" value="addNew">
                                        <span class="icon-tag"></span> Dodaj
                                    </button>
                                </form>

                            </div>
                            <a class="close-reveal-modal">×</a>
                        </div>
                        <!-- Reveal Modals end -->


                </div>
                <table id="responsive-example-table" class="table large-only">
                    <tbody>
                        <tr class="text-right">
                            <th style="text-align: center">Tekst</th>
                            <th style="text-align: center">Redoslijed</th>
                            <th style="text-align: center">Pomicanje</th>
                            <th style="text-align: center;">Dodatno</th>
                        </tr>

                        @foreach ( $akaStrings as $akaString )

                            <tr>
                                <td style="text-align: center;">{{ $akaString->name }}</td>
                                <td style="text-align: center;">{{ $akaString->order_id }}</td>
                                <td style="text-align: center;">
                                    <a @if ($loop->first) disabled @else href="{{ route('admin.move', ['category' => 'aka', 'order_id' => $akaString->order_id, 'where' => 'up']) }}" @endif class="button radius small secondary round">
                                        <span class="icon-arrow-up"></span> Pomakni gore
                                    </a>
                                    <a @if ($loop->last) disabled @else href="{{ route('admin.move', ['category' => 'aka', 'order_id' => $akaString->order_id, 'where' => 'down']) }}" @endif class="button radius small secondary round">
                                        <span class="icon-arrow-down"></span> Pomakni dolje
                                    </a>
                                </td>
                                <td style="text-align: center;">
                                    <button id="buttonRevealModalEdit{{$akaString->id}}" data-reveal-id="modalEdit{{$akaString->id}}" class="button radius small success round">
                                        <span class="icon-document-edit"></span> Uredi
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modalEdit{{$akaString->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                        <h2>Uredi</h2>
                                        <div class="large-12 columns">

                                            <form action="{{ route('admin.aka.update', [$akaString->id]) }}" method="POST" id="formEdit{{$akaString->id}}" name="formEdit{{$akaString->id}}">
                                                @method('PUT')
                                                @csrf
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="name">Aka tekst</label>
                                                        <input type="text" placeholder="" id="name" name="name" value="{{ $akaString->name }}">

                                                        @error('name')
                                                            <small class="error">{{ $message }}</small>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <button class="button radius small success round" type="submit" name="edit" value="{{$akaString->id}}">
                                                    <span class="icon-document-edit"></span> Spremi promjenu
                                                </button>
                                            </form>

                                        </div>
                                        <a class="close-reveal-modal">×</a>
                                    </div>
                                    <!-- Reveal Modals end -->

                                    <button id="buttonRevealModalDelete{{$akaString->id}}" data-reveal-id="modalDelete{{$akaString->id}}" class="button radius small alert round">
                                        <span class="icon-trash"></span> Obriši
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modalDelete{{$akaString->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                        <h2>Obriši</h2>
                                        <div class="large-12 columns">

                                            <form action="{{ route('admin.aka.destroy', [$akaString->id]) }}" method="POST" id="formDelete{{$akaString->id}}" name="formDelete{{$akaString->id}}">
                                                @method('DELETE')
                                                @csrf
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="name">Aka tekst</label>
                                                        <input disabled type="text" placeholder="" id="name" name="name" value="{{ $akaString->name }}">
                                                    </div>
                                                </div>
                                                <button class="button radius small alert round" type="submit" name="delete" value="{{$akaString->id}}">
                                                    <span class="icon-trash"></span> Obriši
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
            <!-- end .timeline -->
        </div>
        <!-- box -->
    </div>
</div>

@endsection