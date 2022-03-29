@extends('layout.layout')

@section('content')

    <div class="mb-4">
        <h1>{{__('views/post.edit').' '.__('views/post.mark')}}</h1>

        <form method="POST" action="{{ route('Mark.update', $mark->id) }}" enctype="multipart/form-data">
            @csrf
            @method('POST')
            @foreach ($depts as $dept)
                <div class="form-check">
                    <label for="dept" class="form-label">{{__('views/post.dept')}} </label>
                    <input class="form-check-input" type="checkbox" value="{{ $dept->id }}" @foreach ($mark_depts as $mark_dept)
                    @if ($mark_dept->id == $dept->id)
                        checked
                    @endif
            @endforeach
            name="depts[]">
            <label class="form-check-label" for="defaultCheck1">
                {{ $dept->name }}
            </label>
    </div>
    @endforeach



    <label for="dept" class="form-label">{{__('views/post.year')}} </label>

    @foreach ($years as $year)
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{ $year->id }}" name="years[]" @foreach ($mark_years as $mark_year)
            @if ($mark_year->id == $year->id)
                checked
            @endif
    @endforeach
    >
    <label class="form-check-label" for="defaultCheck1">
        {{ $year->name }}
    </label>
    </div>
    @endforeach
    <br>


    <label for="subject" class="form-label">{{__('views/post.subject')}} </label>
            <select class="form-control" name="subject">       
                <div class="form-check">
                    @foreach ($subjects as $subject)
                            
                        <option value="{{$subject->id}}" @if ($subject->id == $mark_subjects->id)
                                selected
                        @endif>

                            {{$subject->name}}

                        </option>
                            
                        
                    @endforeach
                    </select>
             </div>
    

    




    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('views/post.title').' '.__('views/post.mark')}}</label>
        <input type="text" name="title" cols="30" rows="8" placeholder="{{__('views/post.title').' '.__('views/post.mark')}}" class="form-control" value="{{$mark->title}}">
        @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
    </div>
    <br>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('views/post.description').' '.__('views/post.mark')}}</label>
        <textarea name="description" cols="30" rows="8" placeholder="التفاصيل" class="form-control">{{$mark->description}}</textarea>
    </div>


    <br>

    <div class="mb-3">
        <label for="formFile" class="form-label">{{__('views/post.existing files')}}</label>
        <br>
        @foreach ($mark_urls as $urls )
        <a href={{$urls->url}}>{{$urls->file_type}}</a><br>
        {{-- <label for="formFile" class="form-label">{{$urls->file_type}}</label> --}}
        @endforeach

        <br>
        <label for="formFile" class="form-label">{{__('views/post.choose file')}} </label>
        <input class="form-control" type="file" id="formFile" name="file">
        
    </div>

    <div>
        <button type="submit" class="btn btn-primary mb-3">{{__('views/post.edit')}}</button>
    </div>
    </form>

@endsection
