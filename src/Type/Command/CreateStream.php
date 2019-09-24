<?php namespace Anomaly\BlocksModule\Type\Command;

use Anomaly\BlocksModule\Type\Contract\TypeInterface;
use Anomaly\Streams\Platform\Stream\Contract\StreamRepositoryInterface;

use Illuminate\Foundation\Bus\DispatchesJobs;

/**
 * Class CreateStream
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class CreateStream
{



    /**
     * The block type instance.
     *
     * @var TypeInterface
     */
    protected $type;

    /**
     * Create a new CreateStream instance.
     *
     * @param TypeInterface $type
     */
    public function __construct(TypeInterface $type)
    {
        $this->type = $type;
    }

    /**
     * Handle the command.
     *
     * @param StreamRepositoryInterface $streams
     * @param Repository $config
     */
    public function handle(StreamRepositoryInterface $streams, Repository $config)
    {
        $streams->create(
            [
                config('app.fallback_locale') => [
                    'name'        => $this->type->getName(),
                    'description' => $this->type->getDescription(),
                ],
                'slug'                              => $this->type->getSlug() . '_blocks',
                'namespace'                         => 'blocks',
                'locked'                            => false,
                'translatable'                      => true,
                'trashable'                         => true,
                'hidden'                            => true,
            ]
        );
    }
}
