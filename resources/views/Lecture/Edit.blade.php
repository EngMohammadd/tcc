@extends('layout.layout')

@section('content')

    <div class="mb-4">
        <h1>{{__('views/post.edit').' '.__('views/post.lecture')}}</h1>

        <form method="POST" action="{{ route('Lecture.update', $lecture->id) }}" enctype="multipart/form-data">
            @csrf
            
            
            <label for="dept" class="form-label f-1">{{__('views/post.dept')}} </label>
            <select class="form-control" name="dept">
                
                @foreach ($depts as $dept)                                 
                        <option value="{{$dept->id}}"@if ($dept->id == $lecture_depts[0]->id) selected @endif>{{$dept->name}}</option>
                       
                @endforeach
                </select>
            <br>
            



            <label for="dept" class="form-label">{{__('views/post.year')}} </label>
            <select class="form-control" name="years">
            @foreach ($years as $year)                                 
                   <option value="{{$year->id}}" @if ($year->id == $lecture_years[0]->id) selected @endif>{{$year->name}}</option>
            @endforeach
            </select>
            <br>

    <label for="subject" class="form-label">{{__('views/post.subject')}} </label>
            <select class="form-control" name="subject">       
                <div class="form-check">
                    @foreach ($subjects as $subject)
                            
                        <option value="{{$subject->id}}" @if ($subject->id == $lecture_subjects->id)
                                selected
                        @endif>

                            {{$subject->name}}

                        </option>
                            
                        
                    @endforeach
                    </select>
             </div>
    

    




    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('views/post.title').' '.__('views/post.lecture')}}</label>
        <input type="text" name="title" cols="30" rows="8" placeholder="{{__('views/post.title').' '.__('views/post.lecture')}}" class="form-control" value="{{$lecture->title}}">
        @error('title')
                    <small class="form-text text-danger">{{$message}}</small>
                @enderror
    </div>
    <br>

    {{-- <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{__('views/post.description').' '.__('views/post.lecture')}}</label>
        <textarea name="description" cols="30" rows="8" placeholder="{{__('views/post.description').' '.__('views/post.lecture')}}" class="form-control">{{$lecture->description}}</textarea>
    </div> --}}


    <br>

    <div class="mb-3">
        <label for="formFile" class="form-label">{{__('views/post.existing files')}}</label>
        <br>
        @foreach ($lecture_urls as $urls )
            <a href={{$urls->url}}>{{$urls->file_type}}</a><br>
        @endforeach
        <br>
        <label for="formFile" class="form-label">{{__('views/post.add new file')}}</label>
        <input class="form-control" type="file" id="formFile" name="file">
        
    </div>

    <div>
        <button type="submit" class="btn btn-primary mb-3">{{__('views/post.edit')}}</button>
    </div>
    </form>

@endsection
