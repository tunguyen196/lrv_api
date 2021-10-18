@extends('layouts.user.app');
@section('content')
    <div class="row">
        <div class="container">
            <ul>

                <li>
                    <a style="text-decoration: none;" href="" contenteditable>
                        <h2>Title #1</h2>
                        <p>Text Content #1</p>
                    </a>
                </li>
                <li>
                    <a href="#" contenteditable>
                        <h2>Title #2</h2>
                        <p>Text Content #2</p>
                    </a>


            </ul>
        </div>
    </div>
    @push('customScript')
        <script>
            $(document).ready(function() {
                all_notes = $("li a");

                all_notes.on("keyup", function() {
                    note_title = $(this).find("h2").text();
                    note_content = $(this).find("p").text();

                    item_key = "list_" + $(this).parent().index();

                    data = {
                        title: note_title,
                        content: note_content
                    };

                    window.localStorage.setItem(item_key, JSON.stringify(data));
                });

                all_notes.each(function(index) {
                    data = JSON.parse(window.localStorage.getItem("list_" + index));

                    if (data !== null) {
                        note_title = data.title;
                        note_content = data.content;

                        $(this).find("h2").text(note_title);
                        $(this).find("p").text(note_content);
                    }
                });
            });

        </script>
    @endpush
@endsection
