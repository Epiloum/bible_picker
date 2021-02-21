@extends('layout')

@section('title', ': 비대면 모임을 위한 간편한 성경공유')
@section('script', 'index.js')
@section('css', 'index.css')

@section('content')
    <hgroup>
        <h1>성경공유</h1>
        <h2>비대면 모임을 위한 간편한 성경공유</h2>
    </hgroup>
    <form>
        <div>
            <select id="testaments">
                <option value="구약">구약</option>
                <option value="신약">신약</option>
            </select>

            <select name="books">
            </select>
        </div>

        <div>
            <select name="start_chapters">
            </select>
            <select name="start_paragraphs">
            </select>
            <span>부터</span>

            <select name="end_chapters">
            </select>
            <select name="end_paragraphs">
            </select>
            <span>까지</span>
        </div>

        <input type="submit" value="말씀보기" />
    </form>
@endsection
