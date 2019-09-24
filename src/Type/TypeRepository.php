<?php namespace Anomaly\BlocksModule\Type;

use Anomaly\BlocksModule\Type\Contract\TypeInterface;
use Anomaly\BlocksModule\Type\Contract\TypeRepositoryInterface;
use Anomaly\Streams\Platform\Entry\EntryRepository;

/**
 * Class TypeRepository
 *
 * @link          http://pyrocms.com/
 * @author        PyroCMS, Inc. <support@pyrocms.com>
 * @author        Ryan Thompson <ryan@pyrocms.com>
 */
class TypeRepository extends EntryRepository implements TypeRepositoryInterface
{

    /**
     * The block type model.
     *
     * @var TypeModel
     */
    protected $model;

    /**
     * Create a new TypeRepository instance.
     *
     * @param TypeModel $model
     */
    public function __construct(TypeModel $model)
    {
        $this->model = $model;
    }

    /**
     * Find a type by it's slug.
     *
     * @param $slug
     * @return TypeInterface
     */
    public function findBySlug($slug)
    {
        return $this->model->where('slug', $slug)->first();
    }
}
