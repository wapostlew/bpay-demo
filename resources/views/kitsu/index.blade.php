@extends('layout.default')

@section('filters')
    {{-- <div class="d-flex"> --}}
    <form class="mt-5 mb-5 " action="" method="get">

        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex flex-start gap-5">
                @foreach ($filters as $key => $value)
                    <div class="">
                        <label for="{{ $key }}">{{ $key }}:</label>
                        <select class="custom-select" name="{{ $key }}">
                            <option disabled @if (!request()->has($key)) selected @endif> select {{ $key }}
                            </option>
                            @foreach ($value as $item)
                                <option value="{{ $item }}" @if (request()->get($key) == $item) selected @endif>
                                    {{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                @endforeach
            </div>
            <div class="d-flex gap-5">
                <button type="submit" class="btn btn-primary">Apply</button>
                <a href="{{ route('show') }}" class="btn btn-warning">Reset</a>
            </div>
        </div>
    </form>
    {{-- </div> --}}
@endsection

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                @foreach ($columns as $column)
                    <th scope="col">{{ $column }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    @foreach ($row->getAttributes() as $key => $value)
                        <th @if ($loop->first) scope="row" @endif
                            @if ($key == 'description') class="col-md-4" @endif>{{ $value }}</th>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
