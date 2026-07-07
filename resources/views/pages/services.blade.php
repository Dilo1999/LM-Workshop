@extends('layouts.app')

@section('content')
@php
    $images = config('lm-workshop.images');
    $services = config('lm-workshop.services');
@endphp

<x-lm.section-hero
    title="Engineering Solutions"
    body="LM Workshop delivers comprehensive engineering services across multiple technical disciplines, enabling clients to work with one trusted engineering partner."
    :img="$images['servicesHero']"
/>

<section class="bg-white py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($services as $service)
                <x-lm.service-card :icon="$service['icon']" :title="$service['title']" :desc="$service['desc']" />
            @endforeach
        </div>
    </div>
</section>
@endsection
