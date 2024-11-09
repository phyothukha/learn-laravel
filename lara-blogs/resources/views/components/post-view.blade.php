@forelse($posts as $post)
    <x-category-view :post="$post"/>


@empty
    <div class=" card ">
        <div class=" card-body">
            There are no results in data
        </div>
    </div>
@endforelse
