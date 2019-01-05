<?php
/**
 * @author      Laurent Jouanneau
 * @copyright   2009-2018 Laurent Jouanneau
 * @link        http://www.jelix.org
 * @licence     GNU Lesser General Public Licence see LICENCE file or http://www.gnu.org/licenses/lgpl.html
 */

class jtcpdfModuleConfigurator extends \Jelix\Installer\Module\Configurator {

    public function configure(\Jelix\Installer\Module\API\ConfigurationHelpers $helpers) {
        if (! $helpers->getConfigIni()->getValue('tcpdf', "responses")) {
            $helpers->getConfigIni()->setValue('tcpdf', "jtcpdf~jResponseTcpdf", "responses");
        }
        if (!$helpers->getConfigIni()->getValue('tcpdf', "_coreResponses")) {
            $helpers->getConfigIni()->setValue('tcpdf', "jtcpdf~jResponseTcpdf", "_coreResponses");
        }
    }


}
