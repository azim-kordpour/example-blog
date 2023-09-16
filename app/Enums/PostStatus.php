<?php

namespace App\Enums;

use AzimKordpour\PowerEnum\Traits\PowerEnum;

/**
 * @method bool isDraft()
 * @method bool isInPublishQueue()
 * @method bool isPublished()
 * @method bool isArchive()
 */
enum PostStatus: string
{
    use PowerEnum;

    case Draft = 'Draft';

    case InPublishQueue = 'InPublishQueue';

    case Published = 'Published';

    case Archive = 'Archive';
}
