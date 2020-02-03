<?php

namespace App\Models\Syst;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $cd_meta_projeto
 * @property int $cd_objetivo_projeto
 * @property string $tx_nome_meta_projeto
 * @property string $tx_codigo_meta_projeto
 * @property Syst.dcObjetivoProjeto $syst.dcObjetivoProjeto
 * @property Osc.tbObjetivoOsc[] $osc.tbObjetivoOscs
 * @property Osc.tbObjetivoProjeto[] $osc.tbObjetivoProjetos
 */
class MetaProjeto extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'syst.dc_meta_projeto';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'cd_meta_projeto';

    /**
     * @var array
     */
    protected $fillable = ['cd_objetivo_projeto', 'tx_nome_meta_projeto', 'tx_codigo_meta_projeto'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function syst.dcObjetivoProjeto()
    {
        return $this->belongsTo('App\Models\Syst\Syst.dcObjetivoProjeto', 'cd_objetivo_projeto', 'cd_objetivo_projeto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function osc.tbObjetivoOscs()
    {
        return $this->hasMany('App\Models\Syst\Osc.tbObjetivoOsc', 'cd_meta_osc', 'cd_meta_projeto');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function osc.tbObjetivoProjetos()
    {
        return $this->hasMany('App\Models\Syst\Osc.tbObjetivoProjeto', 'cd_meta_projeto', 'cd_meta_projeto');
    }
}
