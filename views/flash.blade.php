@if ( $flash = notice()->flash() )
    @if ( $flash->isOverlay() )
        @include('notice::modal', ['class' => 'flash-modal', 'title' => $flash->getTitle(), 'body' => $flash->getMessage()])
    @else
        @include('notice::message', ['class' => 'alert-'.$flash->getLevel(), 'message' => $flash->getMessage()])
    @endif
@endif