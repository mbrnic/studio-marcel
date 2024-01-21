@extends('layouts.admin.index')

@section('content')

        <div class="box">
            <div class="box-header bg-transparent">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i></span>
                </div>
                <h3 class="box-title"><i class="icon-view-list"></i>
                    <span>My Signature Works</span>
                </h3>
            </div>
            <!-- /.box-header -->

            <div hidden class="box-body " style="display: block;">
                <div style="text-align: center;">
                    <button data-reveal-id="modal2AddNew" class="button radius small round">
                        <span class="icon-tag"></span> Dodaj novi signature
                    </button>

                    <!-- Reveal Modals begin -->
                    <div id="modal2AddNew" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                        <h2>Dodaj novi signature</h2>
                        <div class="large-12 columns">

                            <form action="{{ route('admin.signature.store') }}" method="POST" id="formAddNew" name="formAddNewName">
                                @csrf

                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="list_title">Zaglavlje</label>
                                        <input type="text" placeholder="" id="list_title" name="list_title" value="{{ old('list_title') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="name">Naziv</label>
                                        <input type="text" placeholder="" id="name" name="name" value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="subtitle">Podnaslov</label>
                                        <input type="text" placeholder="" id="subtitle" name="subtitle" value="{{ old('subtitle') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="description">Opis</label>
                                        <textarea id="description" name="description" rows="4" cols="50">{{ old('description') }}</textarea>
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


                <table id="responsive-example-table-2" class="table large-only">
                    <tbody>
                        <tr class="text-right">
                            <th style="text-align: center">Naslovnica</th>
                            <th style="text-align: center">Naziv</th>
                            <th style="text-align: center">Redoslijed</th>
                            <th style="text-align: center">Pomicanje</th>
                            <th style="text-align: center;">Dodatno</th>
                        </tr>

                        @foreach ( $signatures as $signature )

                            <tr>
                                <td style="text-align: center;">
                                    @if (isset($signature->headline))
                                        @if ( Str::contains($signature->headline->src, 'youtube.com/watch') )
                                            <img src="{{ Str::replace('www.youtube.com/watch?v=', 'img.youtube.com/vi/', $signature->headline->src) }}/hqdefault.jpg" alt="{{ $signature->headline->alt }}" style="height: 150px;">
                                        @else
                                            <img src="{{ asset('item/' . $signature->headline->src) }}" alt="{{ $signature->headline->alt }}" style="height: 150px;">
                                        @endif
                                    @endif
                                </td>
                                <td style="text-align: center;">{{ $signature->title }}</td>
                                <td style="text-align: center;">{{ $signature->order_id }}</td>
                                <td style="text-align: center;">
                                    <a @if ($loop->first) disabled @else href="{{ route('admin.move', ['category' => 'signature', 'order_id' => $signature->order_id, 'where' => 'up']) }}" @endif class="button radius small secondary round">
                                        <span class="icon-arrow-up"></span> Pomakni gore
                                    </a>
                                    <a @if ($loop->last) disabled @else href="{{ route('admin.move', ['category' => 'signature', 'order_id' => $signature->order_id, 'where' => 'down']) }}" @endif class="button radius small secondary round">
                                        <span class="icon-arrow-down"></span> Pomakni dolje
                                    </a>
                                </td>

                                <td style="text-align: center;">

                                    <a href="{{ route('admin.gallery', ['category' => 'signature', 'order_id' => $signature->order_id]) }}" class="button radius small info round">
                                        <span class="icon-camera"></span> Galerija
                                    </a>

                                    <button id="buttonRevealModal2Edit{{$signature->id}}" data-reveal-id="modal2Edit{{$signature->id}}" class="button radius small success round">
                                        <span class="icon-document-edit"></span> Uredi
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modal2Edit{{$signature->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                        <h2>Uredi signature</h2>
                                        <div class="large-12 columns">

                                            <form action="{{ route('admin.signature.update', [$signature->id]) }}" method="POST" id="formEdit{{$signature->id}}" name="formEdit{{$signature->id}}">
                                                @method('PUT')
                                                @csrf

                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="list_title">Zaglavlje</label>
                                                        <input type="text" placeholder="" id="list_title" name="list_title" value="{{ $signature->list_title }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="name">Naziv</label>
                                                        <input type="text" placeholder="" id="name" name="name" value="{{ $signature->title }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="subtitle">Podnaslov</label>
                                                        <input type="text" placeholder="" id="subtitle" name="subtitle" value="{{ $signature->subtitle }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="description">Opis</label>
                                                        <textarea id="description" name="description" rows="4" cols="50">{{ $signature->description }}</textarea>
                                                    </div>
                                                </div>

                                                <button class="button radius small success round" type="submit" name="edit" value="{{$signature->id}}">
                                                    <span class="icon-document-edit"></span> Spremi promjenu
                                                </button>

                                            </form>

                                        </div>
                                        <a class="close-reveal-modal">×</a>
                                    </div>
                                    <!-- Reveal Modals end -->


                                    <button id="buttonRevealModal2Delete{{$signature->id}}" data-reveal-id="modal2Delete{{$signature->id}}" class="button radius small alert round">
                                        <span class="icon-trash"></span> Obriši
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modal2Delete{{$signature->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                    <h2>Obriši signature</h2>
                                    <div class="large-12 columns">
                                
                                        <form action="{{ route('admin.signature.destroy', [$signature->id]) }}" method="POST" id="formDelete{{$signature->id}}" name="formDelete{{$signature->id}}">
                                            @method('DELETE')
                                            @csrf

                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="list_title">Zaglavlje</label>
                                                    <input disabled type="text" placeholder="" id="list_title" name="list_title" value="{{ $signature->list_title }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="name">Naziv</label>
                                                    <input disabled type="text" placeholder="" id="name" name="name" value="{{ $signature->title }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="subtitle">Podnaslov</label>
                                                    <input disabled type="text" placeholder="" id="subtitle" name="subtitle" value="{{ $signature->subtitle }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="description">Opis</label>
                                                    <textarea disabled id="description" name="description" rows="4" cols="50">{{ $signature->description }}</textarea>
                                                </div>
                                            </div>

                                            <button class="button radius small alert round" type="submit" name="delete" value="{{$signature->id}}">
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