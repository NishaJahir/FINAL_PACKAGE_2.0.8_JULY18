<?php
/**
 * This module is used for real time processing of
 * Novalnet payment module of customers.
 * Released under the GNU General Public License.
 * This free contribution made by request.
 * If you have found this script useful a small
 * recommendation as well as a comment on merchant form
 * would be greatly appreciated.
 *
 * @author       Novalnet AG
 * @copyright(C) Novalnet
 * All rights reserved. <https://www.novalnet.de/>
 */

namespace Novalnet\Migrations;

use Novalnet\Models\TransactionLog;
use Plenty\Modules\Plugin\DataBase\Contracts\Migrate;
use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;
use Plenty\Modules\Plugin\DataBase\Contracts\Query;
use Plenty\Plugin\Log\Loggable;
/**
 * Class CreateTransactionTable
 */
class UpdateTransactionTable
{
    use Loggable;
    /**
     * Create transaction log table
     *
     * @param Migrate $migrate
     */
    public function run(Migrate $migrate)
    {
        $database = pluginApp(DataBase::class);
        $order    = $database->query(TransactionLog::class)->get();
        $this->getLogger(__METHOD__)->error('RRR', $order);
        if (empty ($order)) {
            $migrate->createTable(TransactionLog::class);
        } else {
            $migrate->updateTable(TransactionLog::class);
        }
    }
}
