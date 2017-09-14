<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
        <th style="width: 1px;">
            <input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);">
        </th>
        <th>{{ trans('parcel.number') }}</th>
        <th>{{ trans('parcel.tracking_number') }}</th>
        <th>{{ trans('parcel.bar_code') }}</th>
        <th>{{ trans('parcel.weight') }}</th>
        <th>{{ trans('parcel.client') }}</th>
        <th>{{ trans('parcel.created_by') }}</th>
        <th>{{ trans('parcel.comment') }}</th>
        <th>Photos</th>
        <th>{{ trans('parcel.status') }}</th>
        </thead>
        <tbody>
        @foreach($parcels as $parcel)
            <tr>
                <?php //dd( //asset('storage/app/'.$parcel->parcel_images[0]->filename)) ?>
                <td><input type="checkbox" name="selected[]" value="{{ $parcel->id }}"></td>
                <td>{{ $parcel->number }}</td>
                <td>{{ $parcel->tracking_number }}</td>
                <td>{{ $parcel->bar_code }}</td>
                <td>{{ $parcel->weight }}</td>
                <td>{{ $parcel->client->full_name or null }}</td>
                <td>{{ $parcel->createdBy->name or null }}</td>
                <td><a data-toggle="tooltip" data-placement="bottom" title="{{ $parcel->comment }}">?</a></td>
                <td>
                    <?php
                    if (isset($parcel->parcel_images[0]->filename) && !empty($parcel->parcel_images[0]->filename)) {
                        echo '<img src="' . asset("storage/" . $parcel->parcel_images[0]->filename) . '" width="100" height="50">';
                    }
                    ?>
                </td>
                <td>{{ $parcel->status->name or null }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>