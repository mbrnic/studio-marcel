@extends('layouts.admin.index')

@section('content')

<div class="box">
    <div class="box-header bg-transparent">
        <!-- tools box -->
        <div class="pull-right box-tools">
            <span class="box-btn" data-widget="collapse"><i class="icon-minus"></i></span>
        </div>
        <h3 class="box-title"><i class="icon-view-list"></i>
            <span>Citati</span>
        </h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body " style="display: block;">
        <div style="text-align: center;">
            <button id="buttonModalAddNew" data-reveal-id="modalAddNew" class="button radius small round">
                <span class="icon-tag"></span> Dodaj novi citat
            </button>


                <!-- Reveal Modals begin -->
                <div id="modalAddNew" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                    <h2>Dodaj novi</h2>
                    <div class="large-12 columns">

                        <form action="{{ route('admin.quote.store') }}" method="POST" id="formAddNew" name="formAddNewName">
                            @csrf
                            <div class="row">
                                <div class="large-12 columns">
                                    <label for="quote">Citat</label>
                                    <input type="text" placeholder="" id="quote" name="quote" value="{{ old('quote') }}">
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
                    <th colspan="2" style="text-align: center">Citat</th>
                    <th style="text-align: center">Redoslijed</th>
                    <th style="text-align: center">Pomicanje</th>
                    <th style="text-align: center;">Dodatno</th>
                </tr>

                @foreach ( $quotes as $quote )

                    <tr>
                        <td colspan="2" style="text-align: center;">{{ $quote->value }}</td>
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td style="text-align: center;">
                            <a @if ($loop->first) disabled @else href="{{ route('admin.move', ['category' => 'quote', 'order_id' => $loop->iteration, 'where' => 'up']) }}" @endif class="button radius small secondary round">
                                <span class="icon-arrow-up"></span> Pomakni gore
                            </a>
                            <a @if ($loop->last) disabled @else href="{{ route('admin.move', ['category' => 'quote', 'order_id' => $loop->iteration, 'where' => 'down']) }}" @endif class="button radius small secondary round">
                                <span class="icon-arrow-down"></span> Pomakni dolje
                            </a>
                        </td>
                        <td style="text-align: center;">
                            <button id="buttonRevealModalEdit{{$loop->iteration}}" data-reveal-id="modalEdit{{$loop->iteration}}" class="button radius small success round">
                                <span class="icon-document-edit"></span> Uredi
                            </button>

                            <!-- Reveal Modals begin -->
                            <div id="modalEdit{{$loop->iteration}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                <h2>Uredi</h2>
                                <div class="large-12 columns">

                                    <form action="{{ route('admin.quote.update', [$quote->id]) }}" method="POST" id="formEdit{{$loop->iteration}}" name="formEdit{{$loop->iteration}}">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <label for="quote">Citat</label>
                                                <input type="text" placeholder="" id="quote" name="quote" value="{{ $quote->value }}">
                                            </div>
                                        </div>
                                        <button class="button radius small success round" type="submit" name="edit" value="{{$loop->iteration}}">
                                            <span class="icon-document-edit"></span> Spremi promjenu
                                        </button>
                                    </form>

                                </div>
                                <a class="close-reveal-modal">×</a>
                            </div>
                            <!-- Reveal Modals end -->

                            <button id="buttonRevealModalDelete{{$loop->iteration}}" data-reveal-id="modalDelete{{$loop->iteration}}" class="button radius small alert round">
                                <span class="icon-trash"></span> Obriši
                            </button>

                            <!-- Reveal Modals begin -->
                            <div id="modalDelete{{$loop->iteration}}" class="reveal-modal" data-reveal="" style="display: none; opacity: 1; visibility: hidden;">
                                <h2>Obriši</h2>
                                <div class="large-12 columns">

                                    <form action="{{ route('admin.quote.destroy', [$quote->id]) }}" method="POST" id="formDelete{{$loop->iteration}}" name="formDelete{{$loop->iteration}}">
                                        @method('DELETE')
                                        @csrf
                                        <div class="row">
                                            <div class="large-12 columns">
                                                <label for="quote">Citat</label>
                                                <input disabled type="text" placeholder="" id="quote" name="quote" value="{{ $quote->value }}">
                                            </div>
                                        </div>
                                        <button class="button radius small alert round" type="submit" name="delete" value="{{$loop->iteration}}">
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