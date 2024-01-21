@extends('layouts.admin.index')

@section('content')

        <div class="box">
            <div class="box-header bg-transparent">
                <!-- tools box -->
                <div class="pull-right box-tools">
                    <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i></span>
                </div>
                <h3 class="box-title"><i class="icon-view-list"></i>
                    <span>Galerija</span>
                </h3>
            </div>
            <!-- /.box-header -->

            <div hidden class="box-body " style="display: block;">
                <div style="text-align: center;">
                    <button data-reveal-id="modal2AddNew" class="button radius small round">
                        <span class="icon-tag"></span> Dodaj novi zapis
                    </button>

                    <!-- Reveal Modals begin -->
                    <div id="modal2AddNew" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                        <h2>Dodaj novi zapis</h2>
                        <div class="large-12 columns">

                            <form action="{{ route('admin.item.store') }}" method="POST" enctype="multipart/form-data" id="formAddNew" name="formAddNewName">
                                @csrf

                                <div hidden class="row">
                                    <div class="large-12 columns">
                                        <label for="category_name"></label>
                                        <input hidden type="text" placeholder="" id="category_name" name="category_name" value="{{ $category }}">
                                    </div>
                                </div>
                                <div hidden class="row">
                                    <div class="large-12 columns">
                                        <label for="category_order_id"></label>
                                        <input hidden type="number" placeholder="" id="category_order_id" name="category_order_id" value="{{ $category_id }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="file_upload">Upload</label>
                                        <input type="file" placeholder="" id="file_upload" name="file_upload">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        ili
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="file_link">Youtube link (Primjer: https://www.youtube.com/watch?v=4s0F72TD6iA)</label>
                                        <input type="text" placeholder="" id="file_link" name="file_link" value="{{ old('file_link') }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="large-12 columns">
                                        <label for="alt_text">Alt tekst</label>
                                        <input type="text" placeholder="" id="alt_text" name="alt_text" value="{{ old('alt_text') }}">
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
                            <th style="text-align: center">Prikaz</th>
                            <th style="text-align: center">Redoslijed</th>
                            <th style="text-align: center">Pomicanje</th>
                            <th style="text-align: center;">Dodatno</th>
                        </tr>

                        @foreach ( $items as $item )

                            <tr>
                                <td style="text-align: center;">
                                    @if ( Str::contains($item->src, 'youtube.com/watch') )
                                        <iframe height="150"
                                            src="{{ Str::replace('watch?v=', 'embed/', $item->src) }}">
                                        </iframe>
                                    @elseif ( Str::contains($item->src, '.mp4') )
                                        <video height="150" controls>
                                            <source src="{{ asset('item/' . $item->src) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @elseif ( Str::contains($item->src, ['.jpg', '.jpeg', '.png']) )
                                        <img src="{{ asset('item/' . $item->src) }}" alt="{{ $item->alt }}" style="height: 150px;">
                                    @endif
                                </td>
                                <td style="text-align: center;">{{ $item->order_id }}</td>
                                <td style="text-align: center;">
                                    <a @if ($loop->first) disabled @else href="{{ route('admin.move', ['category' => 'item', 'order_id' => $item->id, 'where' => 'up']) }}" @endif class="button radius small secondary round">
                                        <span class="icon-arrow-up"></span> Pomakni gore
                                    </a>
                                    <a @if ($loop->last) disabled @else href="{{ route('admin.move', ['category' => 'item', 'order_id' => $item->id, 'where' => 'down']) }}" @endif class="button radius small secondary round">
                                        <span class="icon-arrow-down"></span> Pomakni dolje
                                    </a>
                                </td>

                                <td style="text-align: center;">

                                    @if ( $item->id == $headline_id )
                                        <button disabled class="button radius small secondary round">
                                            <span class="fontello-doc-1"></span> NASLOVNICA
                                        </button>
                                    @elseif ( Str::contains($item->src, '.mp4') )
                                        <button disabled class="button radius small secondary round">
                                            <span class="fontello-doc-1"></span> Postavi za naslovnicu
                                        </button>
                                    @else
                                        <a href="{{ route('admin.headline', ['item_id' => $item->id]) }}" class="button radius small info round">
                                            <span class="fontello-doc-1"></span> Postavi za naslovnicu
                                        </a>
                                    @endif

                                    <button id="buttonRevealModal2Edit{{$item->id}}" data-reveal-id="modal2Edit{{$item->id}}" class="button radius small success round">
                                        <span class="icon-document-edit"></span> Uredi
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modal2Edit{{$item->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                        <h2>Uredi zapis</h2>
                                        <div class="large-12 columns">

                                            <form action="{{ route('admin.item.update', [$item->id]) }}" method="POST" enctype="multipart/form-data" id="formEdit{{$item->id}}" name="formEdit{{$item->id}}">
                                                @method('PUT')
                                                @csrf

                                                <div hidden class="row">
                                                    <div class="large-12 columns">
                                                        <label for="category_name"></label>
                                                        <input hidden type="text" placeholder="" id="category_name" name="category_name" value="{{ $category }}">
                                                    </div>
                                                </div>
                                                <div hidden class="row">
                                                    <div class="large-12 columns">
                                                        <label for="category_order_id"></label>
                                                        <input hidden type="number" placeholder="" id="category_order_id" name="category_order_id" value="{{ $category_id }}">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        @if ( Str::contains($item->src, 'youtube.com/watch') )
                                                            <iframe height="150"
                                                                src="{{ Str::replace('watch?v=', 'embed/', $item->src) }}">
                                                            </iframe>
                                                        @elseif ( Str::contains($item->src, '.mp4') )
                                                            <video height="150" controls>
                                                                <source src="{{ asset('item/' . $item->src) }}" type="video/mp4">
                                                                Your browser does not support the video tag.
                                                            </video>
                                                        @elseif ( Str::contains($item->src, ['.jpg', '.jpeg', '.png']) )
                                                            <img src="{{ asset('item/' . $item->src) }}" alt="{{ $item->alt }}" style="height: 150px;">
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="file_upload">Novi upload</label>
                                                        <input type="file" placeholder="" id="file_upload" name="file_upload">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        ili
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="file_link">Youtube link (Primjer: https://www.youtube.com/watch?v=4s0F72TD6iA)</label>
                                                        <input type="text" placeholder="" id="file_link" name="file_link" value="@if(Str::contains($item->src, 'youtube.com/watch')){{ $item->src }}@endif">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="large-12 columns">
                                                        <label for="alt_text">Alt tekst</label>
                                                        <input type="text" placeholder="" id="alt_text" name="alt_text" value="{{ $item->alt }}">
                                                    </div>
                                                </div>

                                                <button class="button radius small success round" type="submit" name="edit" value="{{$item->id}}">
                                                    <span class="icon-document-edit"></span> Spremi promjenu
                                                </button>

                                            </form>

                                        </div>
                                        <a class="close-reveal-modal">×</a>
                                    </div>
                                    <!-- Reveal Modals end -->


                                    <button id="buttonRevealModal2Delete{{$item->id}}" data-reveal-id="modal2Delete{{$item->id}}" class="button radius small alert round">
                                        <span class="icon-trash"></span> Obriši
                                    </button>

                                    <!-- Reveal Modals begin -->
                                    <div id="modal2Delete{{$item->id}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                    <h2>Obriši zapis</h2>
                                    <div class="large-12 columns">
                                
                                        <form action="{{ route('admin.item.destroy', [$item->id]) }}" method="POST" id="formDelete{{$item->id}}" name="formDelete{{$item->id}}">
                                            @method('DELETE')
                                            @csrf

                                            <div class="row">
                                                <div class="large-12 columns">
                                                    @if ( Str::contains($item->src, 'youtube.com/watch') )
                                                        <iframe height="150"
                                                            src="{{ Str::replace('watch?v=', 'embed/', $item->src) }}">
                                                        </iframe>
                                                    @elseif ( Str::contains($item->src, '.mp4') )
                                                        <video height="150" controls>
                                                            <source src="{{ asset('item/' . $item->src) }}" type="video/mp4">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    @elseif ( Str::contains($item->src, ['.jpg', '.jpeg', '.png']) )
                                                        <img src="{{ asset('item/' . $item->src) }}" alt="{{ $item->alt }}" style="height: 150px;">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    ili
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="file_link">Youtube link (Primjer: https://www.youtube.com/watch?v=4s0F72TD6iA)</label>
                                                    <input disabled type="text" placeholder="" id="file_link" name="file_link" value="@if(Str::contains($item->src, 'youtube.com/watch')){{ $item->src }}@endif">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="large-12 columns">
                                                    <label for="alt_text">Alt tekst</label>
                                                    <input disabled type="text" placeholder="" id="alt_text" name="alt_text" value="{{ $item->alt }}">
                                                </div>
                                            </div>

                                            <button class="button radius small alert round" type="submit" name="delete" value="{{$item->id}}">
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