@extends('layout')

@section('main')
    <main class="grow" id="content" role="content">
        <div class="container-fixed py-5">
            <h3 class="mb-5">Details of Job {{$job->title}}</h3>

            <div class="card">
                <div class="card-body">
                    <div class="flex flex-col">
                        @foreach($job->comments()->latest()->cursor() as $comment)
                            <div class="flex items-start relative">
                                <div class="w-9 left-0 top-9 absolute bottom-0 translate-x-1/2 border-l border-l-gray-300">
                                </div>
                                <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                    <i class="ki-filled ki-like-shapes text-base">
                                    </i>
                                </div>
                                <div class="pl-2.5 mb-7 text-md grow">
                                    <div class="flex flex-col">
                                        <div class="text-sm font-medium text-gray-800">
                                            {{$comment->content}}
                                        </div>
                                        <span class="text-xs font-medium text-gray-500">
              {{$comment->created_at->diffForHumans()}}
             </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="flex items-start relative">
                            <div class="flex items-center justify-center shrink-0 rounded-full bg-gray-100 border border-gray-300 size-9 text-gray-600">
                                <i class="ki-filled ki-cup text-base">
                                </i>
                            </div>
                            <div class="pl-2.5 text-md grow">
                                <div class="flex flex-col">
                                    <div class="text-sm text-gray-800">
                                        Job created
{{--                                        <a class="text-sm font-medium link" href="#">--}}
{{--                                            created--}}
{{--                                        </a>--}}
                                    </div>
                                    <span class="text-xs text-gray-600">
                                        {{$job->created_at->diffForHumans()}}
{{--              3 months ago, 4:07 PM--}}
             </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection