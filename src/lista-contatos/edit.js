/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';
/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import {
	PanelBody,
	RangeControl,
	SelectControl,
	ToggleControl,
} from '@wordpress/components';

import { ServerSideRender } from '@wordpress/server-side-render'

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {Element} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	return (
		<>
			<InspectorControls>
				<PanelBody
					title={ __( 'Configurações', 'central-de-contatos' ) }
				>
					<RangeControl
						label={ __( 'Quantidade', 'central-de-contatos' ) }
						value={ attributes.quantidade }
						onChange={ ( valor ) =>
							setAttributes( { quantidade: valor } )
						}
						min={ 1 }
						max={ 50 }
					/>
					<SelectControl
						label={ __( 'Ordenação', 'central-de-contatos' ) }
						value={ attributes.ordenacao }
						options={ [
							{
								label: __( 'Titulo', 'central-de-contatos' ),
								value: 'title',
							},
							{ label: 'date', value: 'date' },
						] }
						onChange={ ( valor ) =>
							setAttributes( { ordenacao: valor } )
						}
					/>
					<ToggleControl
						label={ __( 'Mostrar Email', 'central-de-contatos' ) }
						checked={ attributes.mostrar_email }
						onChange={ ( valor ) =>
							setAttributes( { mostrar_email: valor } )
						}
					/>
				</PanelBody>
			</InspectorControls>
			<div { ...useBlockProps() }>
				<ServerSideRender
				block="central-de-contatos/lista-contatos"
				attributes={ attributes }
				skipBlockSupportAttributes
				/>
			</div>
		</>
	);
}
