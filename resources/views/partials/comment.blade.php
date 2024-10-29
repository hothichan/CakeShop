<!-- Review Top Start -->
{{-- <div class="review-top d-flex mb-4 align-items-center"> --}}
    @foreach ($product->reviews as $review)
        <!-- Review Details Start -->
        <div class="review_details ms-3 mb-5">
            <!-- Rating Start -->
            <div class="review-rating mb-2">
                <span class="review-rating-bg">
                    <span
                        class="review-rating-active"
                        style="width: {{$review->rating/5*100}}%"
                    ></span>
                </span>
            </div>
            <!-- Rating End -->
            <!-- Review Title & Date Start -->
            <div
                class="review-title-date d-flex"
            >
                <h5 class="title me-1">
                    {{$review->user->name}}
                </h5>
                <span>{{$review->created_at->format('d/m/Y h:i A')}}</span>
            </div>
            <!-- Review Title & Date End -->
            <p>
                {{$review->comment}}
            </p>
        </div>
        <!-- Review Details End -->
    @endforeach
{{-- </div> --}}
<!-- Review Top End -->