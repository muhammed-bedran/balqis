import { usePage } from '@inertiajs/vue3'

export function usePermissions(options = {}) {
  const page = usePage()
  const superAdminKey = options.superAdminKey ?? 'super_admin'

  const can = (ability) => {
    const user = page.props.auth?.user
    const abilities = page.props.auth?.abilities || []

    if (user?.[superAdminKey]) {
      return true
    }

    return abilities.includes(ability)
  }

  const canAll = (abilities) => abilities.every((ability) => can(ability))
  const canAny = (abilities) => abilities.some((ability) => can(ability))
  const cannot = (ability) => !can(ability)

  return { can, canAll, canAny, cannot }
}

export default usePermissions
