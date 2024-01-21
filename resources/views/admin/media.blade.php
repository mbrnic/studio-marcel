@extends('layouts.admin.index')

@section('content')

        <div class="box">
            <div class="box-header bg-transparent">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i></span>
                </div>
                <h3 class="box-title"><i class="icon-view-list"></i>
                    <span>Media About Me</span>
                </h3>
            </div>
            <!-- /.box-header -->

            <div hidden class="box-body " style="display: block;">
                <div style="text-align: center;">
                    <button data-reveal-id="modal2AddNew" class="button radius small round">
                        <span class="icon-tag"></span> Dodaj novi media
                    </button>

                    <!-- Reveal Modals begin -->
                    <div id="modal2AddNew" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                        <h2>Dodaj novi media</h2>
                        <div class="large-12 columns">

                            <form action="{{ route('admin.media.store') }}" method="POST" id="formAddNew" name="formAddNewName">
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

                        @foreach ( $medias as $media )

                            <tr>
                                <td style="text-align: center;">
                                    @if (isset($media->headline))
                                        @if ( Str::contains($media->headline->src, 'youtube.com/watch') )
                                            <img src="{{ Str::replace('www.youtube.com/watch?v=', 'img.youtube.com/vi/', $media->headline->src) }}/hqdefault.jpg" alt="{{ $media->headline->alt }}" style="height: 150px;">
                                        @else
                                            <img src="{{ asset('item/' . $media->headline->src) }}" alt="{{ $media->headline->alt }}" style="height: 150px;">
                                        @endif
                                    @endif
                                </td>
                                <td style="text-align: center;">{{ $media->title }}</td>
                                <td style="text-align: center;">{{ $media->order_id }}</td>
                                <td style="text-align: center;">
                                    <a @if ($loop->first) disabled @else href="{{ route('admin.move', ['category' => 'media', 'order_id' => $media->order_id, 'where' => 'up']) }}" @endif class="button radius small secondary round">
                                        <span class="icon-arrow-up"></span> Pomakni gore
                                    </a>
                                    <a @if ($loop->last) disabled @else href="{{ route('admin.move', ['category' => 'media', 'order_id' => $media->order_id, 'where' => 'down']) }}" @endif class="button radius small secondary round">
                                        <span class="icon-arrow-down"></span> Pomakni dolje
                                    </a>
                                </td>

                                <td style="text-align: center;">

                                    <a href="{{ route('admin.gallery', ['category' => 'media', 'order_id' => $media->order_id]) }}" class="button radius small info round">
                                        <span class="icon-camera"></span> Galerija
                                    </a>

                                    <button id="buttonRevealModal2Edit{{$media->id}}" data-reveal-id="modal2Edit{{$media->id}}" class="button radius small success round">
                                        <span class="icon-document-edit"></span> Uredi
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modal2Edit{{$media->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                        <h2>Uredi media</h2>
                                        <div class="large-12 columns">

                                            <form action="{{ route('admin.media.update', [$media->id]) }}" method="POST" id="formEdit{{$media->id}}" name="formEdit{{$media->id}}">
                                                @method('PUT')
                                                @csrf

                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="list_title">Zaglavlje</label>
                                                        <input type="text" placeholder="" id="list_title" name="list_title" value="{{ $media->list_title }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="name">Naziv</label>
                                                        <input type="text" placeholder="" id="name" name="name" value="{{ $media->title }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="subtitle">Podnaslov</label>
                                                        <input type="text" placeholder="" id="subtitle" name="subtitle" value="{{ $media->subtitle }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="description">Opis</label>
                                                        <textarea id="description" name="description" rows="4" cols="50">{{ $media->description }}</textarea>
                                                    </div>
                                                </div>

                                                <button class="button radius small success round" type="submit" name="edit" value="{{$media->id}}">
                                                    <span class="icon-document-edit"></span> Spremi promjenu
                                                </button>

                                            </form>

                                        </div>
                                        <a class="close-reveal-modal">×</a>
                                    </div>
                                    <!-- Reveal Modals end -->


                                    <button id="buttonRevealModal2Delete{{$media->id}}" data-reveal-id="modal2Delete{{$media->id}}" class="button radius small alert round">
                                        <span class="icon-trash"></span> Obriši
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modal2Delete{{$media->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                    <h2>Obriši media</h2>
                                    <div class="large-12 columns">
                                
                                        <form action="{{ route('admin.media.destroy', [$media->id]) }}" method="POST" id="formDelete{{$media->id}}" name="formDelete{{$media->id}}">
                                            @method('DELETE')
                                            @csrf

                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="list_title">Zaglavlje</label>
                                                    <input disabled type="text" placeholder="" id="list_title" name="list_title" value="{{ $media->list_title }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="name">Naziv</label>
                                                    <input disabled type="text" placeholder="" id="name" name="name" value="{{ $media->title }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="subtitle">Podnaslov</label>
                                                    <input disabled type="text" placeholder="" id="subtitle" name="subtitle" value="{{ $media->subtitle }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="description">Opis</label>
                                                    <textarea disabled id="description" name="description" rows="4" cols="50">{{ $media->description }}</textarea>
                                                </div>
                                            </div>

                                            <button class="button radius small alert round" type="submit" name="delete" value="{{$media->id}}">
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