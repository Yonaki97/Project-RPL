<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Noteledge</title>
    @include('layouts.icon')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tom-select/dist/css/tom-select.css" />
    <script src="https://cdn.jsdelivr.net/npm/tom-select/dist/js/tom-select.complete.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/tomselect.css') }}">
    <style>
        body {
            background: linear-gradient(to bottom right, #A8F1FF, #ffffff);
        }
    </style>
@include('layouts.create')
    <script>
        const kategori = new TomSelect("#kategori", {
            placeholder: "Pilih atau cari kategori",
            allowEmptyOption: true,
            hidePlaceholder: true,
            create: false,

            onItemAdd() {

                this.control_input.disabled = true;
            },

            onFocus() {
                if (this.items.length) {

                    this.control_input.disabled = false;
                    this.clear(true);
                }
            }
        });
    </script>
