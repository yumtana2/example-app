@props([
    'breadcrumbs' => [
        [
            'href' => '/',
            'label' => 'TOP'
        ]
    ]
])
<nav class="text-black mx-4 my-3" aria-label="Breadcrumb">
    <ol class="list-none p-o inline-flex">
        @foreach($breadcrumbs as $breadcrumb)
            @if ($loop->last)
                <li>
                    <a href="{{ $breadcrumb['href'] }}" class="text-gray-500"
                       aria-current="page">{{ $breadcrumb['label'] }}</a>
                </li>
            @else
                <li class="flex items-center">
                    <a href="{{ $breadcrumb['href'] }}" class="hover:underline"> {{ $breadcrumb['label'] }}</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M7.293 14.707al i o 010-1.414 L10.586 10 7.293 6.707al 1 0 011.414-1.41414 4 al 10 010 1.4141-4 4 al 1 0 01-1.414 Oz"
                              clip-rule="evenodd"/>
                    </svg>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
