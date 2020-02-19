<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slider
 *
 * @property int $id
 * @property string $slider_name
 * @property string $slider_position
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereSliderName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereSliderPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @property string $position
 * @property string|null $img
 * @property string $clientId
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SliderDetail[] $details
 * @property-read int|null $details_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Slider wherePosition($value)
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Document
 *
 * @property int $id
 * @property string $preview
 * @property string $title
 * @property string $extension
 * @property string|null $text
 * @property string $document
 * @property string $date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Document whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\File|null $documentFile
 */
	class Document extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @property int $id
 * @property string|null $img
 * @property string $authorPosition
 * @property string $authorName
 * @property string $lead
 * @property string $content
 * @property string $href
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $document_id
 * @property-read \App\Models\Document $document
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereAuthorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereAuthorPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereDocumentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereHref($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereLead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Review whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\File|null $imgFile
 */
	class Review extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\File
 *
 * @property int $id
 * @property string $preview
 * @property string $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereName($value)
 * @property string|null $ext
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\File whereExt($value)
 */
	class File extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SliderDetail
 *
 * @property int $id
 * @property string $title
 * @property string $img
 * @property string $lead
 * @property string $href
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $slider_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereHref($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereLead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereSliderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $hrefText
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereHrefText($value)
 * @property string $text
 * @property-read \App\Models\File|null $imgFile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\SliderDetail whereText($value)
 */
	class SliderDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Entry
 *
 * @property int $id
 * @property string $title
 * @property string|null $image_mob
 * @property string|null $image_des
 * @property string|null $preview
 * @property string $date
 * @property int $view_count
 * @property string $content
 * @property string $category
 * @property string $lead
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry articles()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry news()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereImageDes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereImageMob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereLead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry wherePreview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereViewCount($value)
 * @mixin \Eloquent
 * @property int|null $image_desktop
 * @property int|null $image_mobile
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereImageDesktop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereImageMobile($value)
 * @property string|null $mobile
 * @property int|null $desktop
 * @property-read \App\Models\File|null $desktopImg
 * @property-read \App\Models\File|null $previewImg
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereDesktop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Entry whereMobile($value)
 */
	class Entry extends \Eloquent {}
}

