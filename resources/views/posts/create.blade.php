<x-layout>
    <section class="py-8 max-w-4xl mx-auto">
        <h1 class="text-lg font-bold mb-8 pb-2 border-b">
           Creating new post
        </h1>
        <form method="POST" action="/user/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" required />
            <x-form.input name="slug" required />
            <x-form.textarea name="excerpt" id="excerpt"  />
            <x-form.textarea name="body" id="body"  />




            <x-form.button>Publish</x-form.button>

        </form>
    </section>


</x-layout>
