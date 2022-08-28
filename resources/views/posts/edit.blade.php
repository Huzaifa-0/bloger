<x-layout>
        <section class="py-8 max-w-4xl mx-auto">
            <h1 class="text-lg font-bold mb-8 pb-2 border-b">
                Edit post {{$post->title}}
            </h1>
        <form method="POST" action="/user/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" required />
            <x-form.input name="slug" :value="old('slug', $post->slug)" required />
            <x-form.textarea name="excerpt" id="excerpt" >{{old('excerpt', $post->excerpt)}}</x-form.textarea>
            <x-form.textarea name="body" id="body" >{{old('body', $post->body)}}</x-form.textarea>



            @if(auth()->user()->can('edit') || $post->user_id == auth()->id())
            <x-form.button>Update</x-form.button>
            @endif
        </form>
        </section>
</x-layout>
